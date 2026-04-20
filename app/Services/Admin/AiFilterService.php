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
            $systemPrompt = 'Convert user request into JSON filters for staff table.
                Available fields:
                name, email, phone_number, gender, salary, status.
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

        return json_decode($response->choices[0]->message->content, true);
    }
}