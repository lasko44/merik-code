<?php

namespace App\Http\Controllers\Admin\Components;

use App\Facades\ComponentUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ComponentRequest;
use App\Models\Component;
use App\Models\Exercise;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Response;

class ComponentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Component::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $components = Component::query()->orderBy('name')->get();

        return Inertia::render('ComponentLibrary/Index', [
            'components' => $components
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
     */
    public function store(ComponentRequest $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $component = Component::query()->updateOrCreate(
            ['path' => Arr::get($request->validated(), 'path')],
            Arr::except($request->validated(), 'path')
        );

        if ($component->exists()) {
            Session::flash('message', 'component updated');
        } else {
            Session::flash('message', 'new component created');
        }

        return redirect(route('component-library.index'));
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
