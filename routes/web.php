<?php

use App\Http\Controllers\Admin\Components\ComponentController;
use App\Http\Controllers\Admin\Components\DirectoryController;
use App\Http\Controllers\Admin\GeminiDocumentController;
use App\Http\Controllers\Exercises\ExerciseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('exercises', ExerciseController::class);
Route::prefix('admin')->group(function (){
    Route::resource('component-library', ComponentController::class);
    Route::resource('directory', DirectoryController::class);
    Route::get('/gemini-document',[GeminiDocumentController::class, 'index'])->name('gemini-document.index');
});
