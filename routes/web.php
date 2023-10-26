<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TreatmentsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\DesignsController;
use Illuminate\Support\Facades\Route;

//Routes
Route::get('/', function () {return view('welcome');});
Route::get('/about-us', function () {return view('about-us'); })->name('about-us');


//Resource routes
Route::resource('treatments', TreatmentsController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('colors', ColorsController::class);
Route::resource('designs', DesignsController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

Auth::routes();


