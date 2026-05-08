<?php

namespace App\Services\Admin;

use OpenAI;

class AiFilterService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(config('services.openai.key'));
    }

    public function generateFilters($request, $type = 'staff')
    {
        $question = $request['query'];
        
        if ($type === 'job') {
            $systemPrompt = 'Convert user request into JSON filters for job search.
                Available fields:
                - title (string): Job title/role (e.g., "Driver", "Cook", "Housekeeper")
                - city (string): City name
                - state (string): State name
                - compensation (object): Salary filters with operators like {"gt": 5000, "lt": 20000}
                - commitment_type (string): "full-time", "part-time", or "live-in"
                - compensation_type (string): "monthly", "weekly", "daily", or "hourly"
                - preferred_hours (string): Working hours
                - required_skills (string): Skills needed
                - childcare_experience (boolean)
                - cooking_required (boolean)
                - driving_license_required (boolean)
                - first_aid_certified (boolean)
                - pet_care_required (boolean)
                
                IMPORTANT: For job role searches like "driver", "cook", "chef", extract the EXACT role name and put it in "title" field.
                Example: "driver jobs" -> {"title": "driver"}
                Example: "cook in Mumbai" -> {"title": "cook", "city": "Mumbai"}
                
                Return ONLY valid JSON.
                No markdown.
                No explanation.';
        } else {
            $systemPrompt = 'Convert user request into JSON filters for staff search.
                Available fields:
                - name (string): Staff name
                - gender (string): "male" or "female"
                - role (string): Job role/title (e.g. "Driver", "Cook", "Maid", "House Cleaner", "Baby Sitter", "Nanny", "Chef", "Plumber", "Electrician", "Carpenter", "Painter", "Gardener", "Security Guard", "Nurse", "Tutor", "Sweeper", "Laundry", "Dog Walker", "Attendant")
                - location (string): City or area name
                - salary (object): Salary range with operators like {"gt": 5000, "lt": 20000}
                - status (string): Employment status

                IMPORTANT: For role-based searches, ALWAYS extract the job role into the "role" field.
                Example: "Experienced Male Driver" -> {"role": "Driver", "gender": "male"}
                Example: "female cook in Mumbai" -> {"role": "Cook", "gender": "female", "location": "Mumbai"}
                Example: "Professional Housekeeper" -> {"role": "House Cleaner"}
                Example: "plumber in Indore" -> {"role": "Plumber", "location": "Indore"}
                Example: "electrician near me" -> {"role": "Electrician"}
                Example: "Indore City plumber" -> {"role": "Plumber", "location": "Indore"}

                Return ONLY valid JSON.
                No markdown.
                No explanation.';
        }
        
        $response = $this->client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $systemPrompt
                ],
                [
                    'role' => 'user',
                    'content' => $question
                ],
            ],
        ]);

        $content = $response->choices[0]->message->content;
        
        // Sanitize: Remove markdown code blocks if present
        if (str_contains($content, '```')) {
            $content = preg_replace('/```(?:json)?\n?|```/', '', $content);
        }
        
        $content = trim($content);
        $decoded = json_decode($content, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            \Log::error('AI Filter JSON Decode Error: ' . json_last_error_msg(), ['content' => $content]);
            return [];
        }

        return $decoded;
    }
}