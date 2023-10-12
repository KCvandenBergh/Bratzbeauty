<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TreatmentsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\DesignsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// testtesttest
//Routes
Route::get('/', function () {return view('welcome');});
Route::get('/about-us', function () {return view('about-us'); })->name('about-us');


//Resource routes
Route::resource('treatments', TreatmentsController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('colors', ColorsController::class);
Route::resource('designs', DesignsController::class);




