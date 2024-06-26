<?php

namespace App\Http\Controllers\Admin\Components;

use App\Http\Controllers\Controller;
use App\Utilities\ComponentUtil;
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
