<?php

namespace App\Utilities;

use GuzzleHttp\Client;

class GemeniAPICaller
{
    private const END_POINT = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=';
    private const METHOD = 'POST';

    private $client;

    function __construct() {
        $this->client = new Client();
    }

}