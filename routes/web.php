<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TreatmentsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\DesignsController;
use Illuminate\Support\Facades\Route;

//Routes
Route::get('/', function () {return view('index');});
Route::get('/about-us', function () {return view('about-us'); })->name('about-us');
Route::get('/openinghours', function () {return view('openinghours');})->name('openinghours');
Route::get('/contact', function () {return view('contact');})->name('contact');

//Contact routes
//Route::get('/contact', 'ContactController@create')->name('contact.create');
//Route::post('/contact', 'ContactController@submit')->name('contact.submit');

//Resource routes
Route::resource('treatments', TreatmentsController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('colors', ColorsController::class);
Route::resource('designs', DesignsController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User routes
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');

//Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

//Admin routes voor colors
Route::get('/colors/{color}/edit', [ColorsController::class, 'edit'])->name('colors.edit')->middleware('auth');
Route::delete('/colors/{color}', [ColorsController::class, 'destroy'])->name('colors.destroy')->middleware('auth');
Route::get('/colors/create', [ColorsController::class, 'create'])->name('colors.create')->middleware('auth');

//Admin routes voor designs
Route::get('/designs/{design}/edit', [DesignsController::class, 'edit'])->name('designs.edit')->middleware('auth');
Route::delete('/designs/{design}', [DesignsController::class, 'destroy'])->name('designs.destroy')->middleware('auth');
Route::get('/designs/create', [DesignsController::class, 'create'])->name('designs.create')->middleware('auth');

//Admin routes voor reserveringen
Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit')->middleware('auth');
Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy')->middleware('auth');


Auth::routes();


