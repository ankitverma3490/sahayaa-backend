<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ChatbotService;
use App\Services\EmbeddingService;
use App\Models\User;
use App\Models\SubscriptionUser;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * POST /api/chat
     *
     * Handles conversational messages. Returns AI reply + optional search filters.
     * When filters are returned, the frontend should call /admin/staff/get-ai-data
     * with those filters to get results.
     */
    public function index(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500|min:1',
            'history' => 'nullable|array|max:20',
            'history.*.role' => 'required|string|in:user,assistant',
            'history.*.content' => 'required|string|min:1',
        ]);

        $userMessage = trim($request->input('message'));
        if (empty($userMessage)) {
            return response()->json(['success' => false, 'error' => 'Message cannot be empty'], 422);
        }

        $history = $request->input('history', []);
        $userId = Auth::id();

        try {
            $chatbot = new ChatbotService();
        } catch (\RuntimeException $e) {
            return response()->json([
                'success' => false,
                'reply' => 'AI service is not configured yet. Please use the search bar to find staff.',
                'action' => 'error',
            ], 503);
        }

        $result = $chatbot->chat($userMessage, $history, $userId);

        // If the chatbot generated filters, check subscription before running search
        $searchResults = null;
        if ($result['filters'] && $result['action'] === 'search') {
            // Subscription limit check — same as StaffController::getAiData
            $subscription = SubscriptionUser::where('user_id', $userId)->first();
            $plan = $subscription ? Subscription::find($subscription->subscription_id) : null;
            $canUseAi = $subscription && $plan
                && ($plan->subscription_limit == 0 || $subscription->user_limit < $plan->subscription_limit);

            if ($canUseAi) {
                $searchResults = $this->executeSearch($result['filters'], $userId);
                $subscription->increment('user_limit');
            }
            // If no subscription, results stay null — frontend shows just the AI text reply
        }

        return response()->json([
            'success' => true,
            'reply' => $result['reply'],
            'filters' => $result['filters'],
            'action' => $result['action'],
            'results' => $searchResults,
        ]);
    }

    /**
     * Execute a staff search using the filters extracted by the chatbot.
     * Reuses the same logic as getAiData but with pre-extracted filters.
     */
    protected function executeSearch(array $filters, int $userId): ?array
    {
        try {
            $query = User::with(['userWorkInfo', 'addresses', 'kycInformation'])
                ->where('user_role_id', 2)
                ->where('is_job_seeking', 1);

            // Role filter
            if (!empty($filters['role'])) {
                $role = strtolower(trim($filters['role']));
                $roleAliases = [
                    'driver' => ['driver', 'Driver', 'Driver / Chauffeur', 'Chauffeur'],
                    'cook' => ['cook', 'Cook', 'chef', 'Chef', 'Cook / Chef', 'Chef / Baker'],
                    'chef' => ['chef', 'Chef', 'cook', 'Cook', 'Cook / Chef', 'Chef / Baker'],
                    'maid' => ['maid', 'Maid', 'House Cleaner', 'house cleaner', 'House Cleaner / Maid', 'cleaner'],
                    'nanny' => ['nanny', 'Nanny', 'Baby Sitter', 'baby sitter', 'Baby Sitter / Nanny', 'Babysitter'],
                    'housekeeper' => ['housekeeper', 'Housekeeper', 'house keeper', 'House Keeper'],
                    'gardener' => ['gardener', 'Gardener'],
                    'security' => ['security', 'Security', 'Security Guard', 'guard', 'Guard'],
                    'nurse' => ['nurse', 'Nurse', 'Nurse / Caretaker', 'caretaker'],
                    'tutor' => ['tutor', 'Tutor', 'teacher', 'Teacher'],
                    'plumber' => ['plumber', 'Plumber'],
                    'electrician' => ['electrician', 'Electrician'],
                    'carpenter' => ['carpenter', 'Carpenter'],
                    'painter' => ['painter', 'Painter'],
                    'sweeper' => ['sweeper', 'Sweeper'],
                    'laundry' => ['laundry', 'Laundry', 'Laundry / Ironing'],
                    'dog walker' => ['dog walker', 'Dog Walker', 'Pet Walker'],
                    'attendant' => ['attendant', 'Attendant', 'Personal Attendant'],
                ];
                $searchValues = $roleAliases[$role] ?? [$role, ucfirst($role)];
                $query->whereHas('userWorkInfo', function ($sub) use ($searchValues) {
                    $sub->where(function ($inner) use ($searchValues) {
                        foreach ($searchValues as $val) {
                            $inner->orWhereRaw("LOWER(primary_role) LIKE ?", ['%' . strtolower($val) . '%']);
                        }
                    });
                });
            }

            // Location filter
            if (!empty($filters['location'])) {
                $loc = $filters['location'];
                $query->where(function ($q) use ($loc) {
                    $q->whereHas('addresses', function ($sub) use ($loc) {
                        $sub->where('city', 'like', '%' . $loc . '%')
                            ->orWhere('state', 'like', '%' . $loc . '%');
                    })
                    ->orWhereHas('userWorkInfo', function ($sub) use ($loc) {
                        $sub->where('preferred_work_location', 'like', '%' . $loc . '%');
                    })
                    ->orWhere('current_city', 'like', '%' . $loc . '%');
                });
            }

            // Gender filter
            if (!empty($filters['gender'])) {
                $query->where('gender', strtolower($filters['gender']));
            }

            // Experience filter
            if (!empty($filters['experience'])) {
                $exp = (int) $filters['experience'];
                $query->whereHas('userWorkInfo', function ($q) use ($exp) {
                    $q->where('total_experience', '>=', $exp);
                });
            }

            // Skills filter
            if (!empty($filters['skills']) && is_array($filters['skills'])) {
                $skills = $filters['skills'];
                $query->whereHas('userWorkInfo', function ($q) use ($skills) {
                    $q->where(function ($inner) use ($skills) {
                        foreach ($skills as $skill) {
                            $inner->orWhere('skills', 'like', '%' . $skill . '%')
                                  ->orWhere('primary_role', 'like', '%' . $skill . '%')
                                  ->orWhere('additional_info', 'like', '%' . $skill . '%');
                        }
                    });
                });
            }

            // Languages filter
            if (!empty($filters['languages']) && is_array($filters['languages'])) {
                $langs = $filters['languages'];
                $query->whereHas('userWorkInfo', function ($q) use ($langs) {
                    $q->where(function ($inner) use ($langs) {
                        foreach ($langs as $lang) {
                            $inner->orWhere('languages_spoken', 'like', '%' . $lang . '%');
                        }
                    });
                });
            }

            // Salary filter
            if (!empty($filters['salary_min'])) {
                $query->whereHas('userWorkInfo', function ($q) use ($filters) {
                    $q->where('salary', '>=', $filters['salary_min']);
                });
            }
            if (!empty($filters['salary_max'])) {
                $query->whereHas('userWorkInfo', function ($q) use ($filters) {
                    $q->where('salary', '<=', $filters['salary_max']);
                });
            }

            $data = $query->get();

            // Semantic ranking if embeddings exist
            if ($data->isNotEmpty()) {
                try {
                    $queryText = $this->buildSearchText($filters);
                    $embeddingService = new EmbeddingService();
                    $queryEmbedding = $embeddingService->generateEmbedding($queryText);

                    if ($queryEmbedding) {
                        $ranked = [];
                        foreach ($data as $staffMember) {
                            $embedding = null;
                            if ($staffMember->userWorkInfo && !empty($staffMember->userWorkInfo->embedding)) {
                                $raw = $staffMember->userWorkInfo->embedding;
                                $embedding = is_string($raw) ? json_decode($raw, true) : $raw;
                            }
                            $similarity = ($embedding && is_array($embedding))
                                ? EmbeddingService::cosineSimilarity($queryEmbedding, $embedding)
                                : 0.0;
                            $staffMember->_similarity = round($similarity, 4);
                            $ranked[] = $staffMember;
                        }
                        usort($ranked, fn($a, $b) => ($b->_similarity ?? 0) <=> ($a->_similarity ?? 0));
                        $data = collect($ranked);
                    }
                } catch (\Throwable $e) {
                    // Ranking failed, keep filter-based order
                }
            }

            // Map to arrays including _similarity
            return $data->map(function ($item) {
                $arr = $item->toArray();
                $arr['_similarity'] = $item->_similarity ?? 0;
                return $arr;
            })->toArray();
        } catch (\Throwable $e) {
            \Log::warning('Chatbot search execution failed', ['error' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Build a text string from filters for embedding search.
     */
    protected function buildSearchText(array $filters): string
    {
        $parts = [];
        if (!empty($filters['role'])) $parts[] = $filters['role'];
        if (!empty($filters['location'])) $parts[] = $filters['location'];
        if (!empty($filters['skills'])) $parts[] = implode(' ', $filters['skills']);
        if (!empty($filters['languages'])) $parts[] = implode(' ', $filters['languages']);
        return implode(' ', $parts);
    }
}
