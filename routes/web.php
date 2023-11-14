<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TreatmentsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\DesignsController;
use Illuminate\Support\Facades\Route;

//Routes
Route::get('/', function () {return view('index');});
Route::get('/about-us', function () {return view('about-us'); })->name('about-us');


//Resource routes
Route::resource('treatments', TreatmentsController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('colors', ColorsController::class);
Route::resource('designs', DesignsController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

//Admin routes voor colors
Route::get('/colors/{color}/edit', [ColorsController::class, 'edit'])->name('colors.edit')->middleware('auth');
Route::delete('/colors/{color}', [ColorsController::class, 'destroy'])->name('colors.destroy')->middleware('auth');
Route::get('/colors/create', [ColorsController::class, 'create'])->name('colors.create')->middleware('auth');

//Admin routes voor designs


//Admin routes voor reserveringen




Auth::routes();


