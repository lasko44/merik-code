<?php

namespace App\Http\Controllers\Exercises;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @codeCoverageIgnore  //TODO Remove when used
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resources
     */
    public function show(Exercise $exercise)
    {
        return Inertia::render('Exercises/Show', [
            'exercise' => $exercise->load(['category','language']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @codeCoverageIgnore //TODO Remove when used
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
