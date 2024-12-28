<?php

namespace App\Http\Controllers\Admin;

use App\Facades\ComponentUtil;
use App\Http\Controllers\Controller;
use App\Utilities\GeminiAPICaller;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

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
             return response(['error'=>true,'error-msg'=>'Failed to retrieve contents.'],404);
         }
    }
}
