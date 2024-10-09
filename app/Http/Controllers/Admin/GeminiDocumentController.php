<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utilities\GemeniAPICaller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class GeminiDocumentController extends Controller
{
    private const PROMPT = "Please document this Vue 3 code: \n";
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(GemeniAPICaller $caller)
    {
        $payload = request()->get('payload');
         try {
             $gemeniResponse = $caller->call(self::PROMPT, $payload);

             return response()->json($gemeniResponse);
         }
         catch (Exception|GuzzleException $exception){

         }
    }
}
