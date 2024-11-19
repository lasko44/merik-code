<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utilities\ComponentUtil;
use App\Utilities\GeminiAPICaller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class GeminiDocumentController extends Controller
{
    private const PROMPT = "Please document this Vue 3 code: \n";
    /**
     */
    public function index(GeminiAPICaller $caller)
    {
        $payload = request()->query('payload');
         try {
             $fileContents = ComponentUtil::getComponentContents($payload);
             $geminiResponse = $caller->call(self::PROMPT, $fileContents);

             return response()->json($geminiResponse);
         }
         catch (Exception|GuzzleException $exception){

         }
    }
}
