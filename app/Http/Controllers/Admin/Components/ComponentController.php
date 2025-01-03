<?php

namespace App\Http\Controllers\Admin\Components;

use App\Facades\ComponentUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ComponentRequest;
use App\Models\Component;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $components = Component::query()->orderBy('name')->get();

        return Inertia::render('ComponentLibrary/Index', [
            'exercise' => Exercise::with(['category','language'])->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $componentDirectories = ComponentUtil::getComponentDirectories();

        return Inertia::render('ComponentLibrary/Create', [
            'componentDirectories' => $componentDirectories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function store(ComponentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function edit(Component $component)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function update(Request $request, Component $component)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function destroy(Component $component)
    {
        //
    }
}
