<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;
use App\Models\User;

class ChatbotService
{
    protected $client;
    protected string $model = 'gpt-4o-mini';

    public function __construct()
    {
        $apiKey = config('services.openai.key');
        if (empty($apiKey)) {
            throw new \RuntimeException('OPENAI_API_KEY is not configured. Please set it in Railway env vars.');
        }
        $this->client = OpenAI::client($apiKey);
    }

    /**
     * Process a chat message and return AI response with optional search results.
     *
     * @param string $userMessage  The user's latest message
     * @param array  $history      Previous conversation messages [{role, content}]
     * @param int    $userId       The authenticated user's ID
     * @return array               { reply: string, filters: ?array, action: string }
     */
    public function chat(string $userMessage, array $history, int $userId): array
    {
        $user = User::with(['userWorkInfo', 'addresses'])->find($userId);

        $systemPrompt = $this->buildSystemPrompt($user);

        $messages = [['role' => 'system', 'content' => $systemPrompt]];

        // Add conversation history (last 20 messages to maintain context)
        $recentHistory = array_slice($history, -20);
        foreach ($recentHistory as $msg) {
            $messages[] = [
                'role' => $msg['role'] ?? 'user',
                'content' => $msg['content'] ?? '',
            ];
        }

        // Add current user message
        $messages[] = ['role' => 'user', 'content' => $userMessage];

        try {
            $response = $this->client->chat()->create([
                'model' => $this->model,
                'messages' => $messages,
                'temperature' => 0.7,
                'max_tokens' => 500,
            ]);

            $reply = $response->choices[0]->message->content ?? '';

            // Parse the AI response for structured data
            $parsed = $this->parseResponse($reply, $userMessage);

            return [
                'reply' => $parsed['reply'],
                'filters' => $parsed['filters'],
                'action' => $parsed['action'], // 'search', 'clarify', 'info'
            ];
        } catch (\Throwable $e) {
            \Log::warning('Chatbot API failed', [
                'error' => $e->getMessage(),
                'user_id' => $userId,
            ]);

            return [
                'reply' => "I'm having trouble connecting to my AI brain right now. Please try describing what you're looking for in the search bar, or try again in a moment.",
                'filters' => null,
                'action' => 'error',
            ];
        }
    }

    /**
     * Build the system prompt for the chatbot.
     */
    protected function buildSystemPrompt(?User $user): string
    {
        $locationHint = '';
        if ($user) {
            $city = $user->current_city ?? $user->addresses->first()?->city ?? null;
            $state = $user->current_state ?? $user->addresses->first()?->state ?? null;
            if ($city || $state) {
                $locationHint = "The user is located in " . implode(', ', array_filter([$city, $state])) . ". ";
            }
        }

        return "You are Sahayya AI, a friendly and smart assistant that helps house owners find the right domestic staff (cooks, drivers, maids, nannies, etc.) on the Sahayya platform.

{$locationHint}

YOUR JOB:
1. Understand what kind of staff the user needs
2. Ask smart follow-up questions to narrow down the search
3. When you have enough info, generate search filters

CONVERSATION STYLE:
- Be warm, friendly, conversational (mix of Hindi/English is fine)
- Keep responses SHORT (1-3 sentences max)
- Don't ask too many questions at once — max 1-2 per message
- If the user gives a complete query, confirm and generate filters immediately

AVAILABLE FILTERS you can extract:
- role: cook, chef, driver, maid, nanny, housekeeper, gardener, security, nurse, tutor, plumber, electrician, carpenter, painter, sweeper, laundry, dog walker, attendant
- location: city name (only if user mentions a specific city)
- gender: male / female
- experience: minimum years (number)
- skills: array of specific skills (e.g., ["south indian cooking", "vegetarian", "first aid"])
- languages: array of languages (e.g., ["hindi", "english", "telugu"])
- salary_min: minimum salary (number)
- salary_max: maximum salary (number)

WHEN TO GENERATE FILTERS:
- When you have at least the ROLE clear
- Generate a JSON block wrapped in ```filters ... ``` at the END of your response
- Example: If user says "I need a cook who knows south indian food in Mumbai", respond with something like:
  'Great! Let me find south indian cooks in Mumbai for you. Here are the best matches!'
  Then add: ```filters {"role": "cook", "location": "Mumbai", "skills": ["south indian cuisine"]}```

RULES:
- If role is NOT clear, ask a clarifying question (don't guess)
- If user says "near me" or doesn't mention city, DON'T add location filter
- If user asks about pricing, subscription, or app features — answer normally (no filters needed)
- Never generate filters for non-staff queries (e.g., "how are you", "what can you do")
- Always use lowercase for filter values
- Response MUST be in this format: conversational reply + optional ```filters {...}```";
    }

    /**
     * Parse the AI response to extract filters and clean up the reply text.
     */
    protected function parseResponse(string $reply, string $userMessage): array
    {
        $filters = null;
        $action = 'info';

        // Try multiple filter extraction patterns (GPT may output different formats)
        $matched = false;
        $patterns = [
            '/```filters\s*\n?(.*?)\n?\s*```/s',   // ```filters {...}```
            '/```Filters\s*\n?(.*?)\n?\s*```/s',   // ```Filters {...}``` (case variation)
            '/```json\s*\n?(.*?)\n?\s*```/s',      // ```json {...}```
            '/```\s*\n?\{.*?"role".*?\}\s*\n?```/s', // ``` {...with role...} ``` (generic code block with role)
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $reply, $match)) {
                $jsonStr = trim($match[1] ?? $match[0]);
                // Strip markdown code fences if present
                $jsonStr = preg_replace('/^```(?:json|filters)?\s*/i', '', $jsonStr);
                $jsonStr = preg_replace('/\s*```$/', '', $jsonStr);
                $jsonStr = trim($jsonStr);

                $decoded = json_decode($jsonStr, true);
                if ($decoded && is_array($decoded) && json_last_error() === JSON_ERROR_NONE) {
                    $filters = $decoded;
                    $action = 'search';
                    $matched = true;
                    break;
                }
            }
        }

        // Fallback: check if the entire reply is bare JSON with a "role" key
        if (!$matched) {
            $trimmedReply = trim($reply);
            $decoded = json_decode($trimmedReply, true);
            if ($decoded && is_array($decoded) && isset($decoded['role']) && json_last_error() === JSON_ERROR_NONE) {
                $filters = $decoded;
                $action = 'search';
                $matched = true;
            }
        }

        // Remove any code blocks from the visible reply
        $reply = preg_replace('/```\w*\s*\n?.*?\n?\s*```/s', '', $reply);
        $reply = trim($reply);

        // If reply is empty after removing filters, add a default
        if (empty($reply) && $filters) {
            $reply = "Here are the best matches for you!";
        }

        return [
            'reply' => $reply,
            'filters' => $filters,
            'action' => $action,
        ];
    }
}
