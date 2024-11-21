<?php

namespace App\Http\Controllers\Admin\Components;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Exercise;

use App\Utilities\ComponentUtil\ComponentUtilFacade;
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
        $components = Component::with('componentProps')->orderBy('name')->get();

        return Inertia::render('ComponentLibrary/Index', [
            'exercise' => Exercise::with(['category','language'])->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $componentDirectories = ComponentUtilFacade::getComponentDirectories();

        return Inertia::render('ComponentLibrary/Create', [
            'componentDirectories' => $componentDirectories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Component $component)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Component $component)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Component $component)
    {
        //
    }
}
