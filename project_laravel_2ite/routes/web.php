<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\MachineController;
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/machine', function(){return view('machine');});
Route::get('/classe', function(){return view('classe');});
Route::get('/statistique', [MachineController::class, 'statistique']);
Route::get('/', function(){return view('auth.login');});
Route::resource('classe',SalleController::class);
Route::resource('machine',MachineController::class);
Route::get('classe/{id}/edit', 'SalleController@edit');