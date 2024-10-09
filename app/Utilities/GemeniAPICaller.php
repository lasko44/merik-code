<?php

namespace App\Utilities;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Casts\Json;

use function MongoDB\BSON\toJSON;

class GemeniAPICaller
{
    private const END_POINT = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=';
    private const METHOD = 'POST';

    private $client;

    function __construct() {
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function call(string $prompt, string $payload): string
    {
        $headers = ['Content-Type' => 'application/json'];
        $body = $this->buildBody($prompt, $payload);
        $url = self::END_POINT . env('GEMINI_API_KEY');

        $response = $this->client->post($url, ['headers' => $headers], ['body' => $body,]);

        return $response->getBody();
    }

    private function buildBody(string $prompt, string $payload): bool|string
    {
        $body = [
            "contents" => [
                "parts" => [
                    "text" => `$prompt $payload`
                ],
            ],
        ];

        return json_encode($body);
    }

}