<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Authcontroller;

Route::post('/signup', [Authcontroller::class, 'signup']);
Route::get('/login', function () {
    return view('welcome');
});
Route::post('/login', [Authcontroller::class, 'login']);
Route::post('/logout', [Authcontroller::class, 'logout'])->middleware('auth:sanctum');
Route::get('/', [StudentController::class, 'index']);
Route::resource('students', StudentController::class);



Route::get('/layout', function () {
    return view('layout');
});
