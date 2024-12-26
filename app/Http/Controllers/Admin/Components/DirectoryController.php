<?php

namespace App\Http\Controllers\Admin\Components;

use App\Facades\ComponentUtil;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DirectoryController extends Controller
{
    public function index(): JsonResponse
    {

        $path = request()->input('path') ?? [];

        $directories = ComponentUtil::getComponentDirectories($path);

        return response()->json($directories);
    }
}
