<?php

namespace Tests\Unit\Utilities;

use App\Utilities\GeminiAPICaller;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GemeniAPICallerTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_call_gemini(): void
    {
        // Arrange
        $mockedResponse = [
            'content' => [
                'parts' => [
                    ['text' => 'Generated content based on prompt and payload.']
                ]
            ]
        ];

        $prompt = 'This is a test prompt';
        $payload = 'and this is test payload.';
        $expectedBody = json_encode([
            "contents" => [
                "parts" => [
                    "text" => "{$prompt} {$payload}"
                ],
            ],
        ]);


        $apiKey = 'test-api-key';
        config(['app.env' => 'testing']);
        putenv("GEMINI_API_KEY={$apiKey}");
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key={$apiKey}";

        Http::fake([
            'https://generativelanguage.googleapis.com/*' => Http::response(json_encode([
                [[
                    'content' => [
                        'parts' => [
                            ['text' => 'Generated content based on prompt and payload.']
                        ]
                    ]
                ]
            ]]), 200)
        ]);


        $geminiAPICaller = new GeminiAPICaller();

        // Act
        $responseText = $geminiAPICaller->call($prompt, $payload);

        // Assert
        $this->assertEquals('Generated content based on prompt and payload.', $responseText);

        Http::assertSent(function ($request) use ($url, $expectedBody) {
            return $request->url() === $url
                && $request->body() === $expectedBody
                && $request->header('Content-Type')[0] === 'application/json';
        });
    }
}
