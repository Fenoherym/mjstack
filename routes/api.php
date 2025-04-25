<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/contact', [ContactController::class, '__invoke'])->name('contact');
Route::get('/projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('projects');
