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

    public function generateFilters($request)
    {
        $question = $request['query'];
        
        $response = $this->client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Convert user request into JSON filters for staff table.
                        Available fields:
                        name, email, phone_number, gender, salary, status.
                        Return ONLY valid JSON.
                        No markdown.
                        No explanation.'
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