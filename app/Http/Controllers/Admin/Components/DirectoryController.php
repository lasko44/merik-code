<?php

namespace App\Http\Controllers\Admin\Components;

use App\Http\Controllers\Controller;
use App\Utilities\ComponentUtil\ComponentUtilFacade;
use Illuminate\Http\JsonResponse;

class DirectoryController extends Controller
{
    public function index(): JsonResponse
    {

        $path = request()->input('path') ?? [];

        $directories = ComponentUtilFacade::getComponentDirectories($path);

        return response()->json($directories);
    }
}
