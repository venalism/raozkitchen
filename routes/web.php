<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;


// Landing Page
Route::get('/', function () {
    return view('client.landing');
})->name('landing');
// About Page
Route::get('/about', function () {
    return view('client.about');
})->name('about');
// CRUD Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
