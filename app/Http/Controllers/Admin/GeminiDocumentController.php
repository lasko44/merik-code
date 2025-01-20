<?php

namespace App\Http\Controllers\Admin;

use App\Facades\ComponentUtil;
use App\Http\Controllers\Controller;
use App\Utilities\GeminiAPICaller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GeminiDocumentController extends Controller
{
    private const PROMPT = "Please tell me what this vue component does in a few sentences: \n";
    /**
     */
    public function index(GeminiAPICaller $caller): Application|Response|JsonResponse|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $payload = request()->query('payload');
         try {
             $fileContents = ComponentUtil::getComponentContents($payload);
             $geminiResponse = $caller->call(self::PROMPT, $fileContents);

             return response()->json($geminiResponse);
         }
         catch (Exception|GuzzleException $exception){
             return response(['error'=>true,'error-msg'=>'Failed to retrieve contents.'],404);
         }
    }
}
