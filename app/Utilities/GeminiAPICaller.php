<?php

namespace App\Utilities;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Http;


class GeminiAPICaller
{
    private const END_POINT = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=';

    public function call(string $prompt, string $payload): string
    {
        $headers = ['Content-Type' => 'application/json'];
        $body = $this->buildBody($prompt, $payload);
        $url = self::END_POINT . env('GEMINI_API_KEY');

        $response = Http::withBody($body, $headers['Content-Type'])->post($url);
        return collect(collect(json_decode($response->body()))->first())->first()->content->parts[0]->text;
    }

    private function buildBody(string $prompt, string $payload): bool|string
    {
        $body = [
            "contents" => [
                "parts" => [
                    "text" => "{$prompt} {$payload}"
                ],
            ],
        ];

        return json_encode($body);
    }

}