<?php

namespace App\Http\Controllers\Admin\Components;

use App\Facades\ComponentUtil;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class DirectoryController extends Controller
{

    public function index(): JsonResponse
    {
        if(!Auth::user()->isAdmin()){
            abort(404);
        }
        $path = request()->input('path') ?? [];

        $directories = ComponentUtil::getComponentDirectories($path);

        return response()->json($directories);
    }
}
