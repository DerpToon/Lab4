<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\RecipeController;

Route::resource('recipes', RecipeController::class);

Route::get('/search', [RecipeController::class,'search'])->name('recipes.search');