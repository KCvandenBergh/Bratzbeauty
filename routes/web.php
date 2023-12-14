<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TreatmentsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\DesignsController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

//Routes
Route::get('/', function () {return view('index');});
Route::get('/about-us', function () {return view('about-us'); })->name('about-us'); 
Route::get('/openinghours', function () {return view('openinghours');})->name('openinghours');
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::get('/reviews/index', [ReviewsController::class, 'index'])->name('reviews.index');

//Contact routes
//Route::get('/contact', 'ContactController@create')->name('contact.create');
//Route::post('/contact', 'ContactController@submit')->name('contact.submit');

//Resource routes
Route::resource('treatments', TreatmentsController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('colors', ColorsController::class);
Route::resource('designs', DesignsController::class);

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// auth routes (for logged in users)
Route::middleware(['auth'])->group(function () {
    Route::get('/reviews/create', [ReviewsController::class, 'create'])->name('reviews.create')->middleware('auth');
});


// Admin routes
Route::group(['middleware' => ['auth', 'admin']], function () {

//Admin routes voor colors
    Route::get('/colors/{color}/edit', [ColorsController::class, 'edit'])->name('colors.edit')->middleware('admin');
    Route::delete('/colors/{color}', [ColorsController::class, 'destroy'])->name('colors.destroy')->middleware('admin');
    Route::get('/colors/create', [ColorsController::class, 'create'])->name('colors.create')->middleware('admin');

//Admin routes voor designs
    Route::get('/designs/{design}/edit', [DesignsController::class, 'edit'])->name('designs.edit')->middleware('admin');
    Route::delete('/designs/{design}', [DesignsController::class, 'destroy'])->name('designs.destroy')->middleware('admin');
    Route::get('/designs/create', [DesignsController::class, 'create'])->name('designs.create')->middleware('admin');

//Admin routes voor reserveringen
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit')->middleware('admin');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy')->middleware('admin');

//Admin routes voor treatments
    Route::get('/treatments/create', [TreatmentsController::class, 'create'])->name('treatments.create')->middleware('admin');
    Route::get('/treatments/{treatment}/edit', [TreatmentsController::class, 'edit'])->name('treatments.edit')->middleware('admin');
    Route::delete('/treatments/{treatment}', [TreatmentsController::class, 'destroy'])->name('treatments.destroy')->middleware('admin');
    Route::put('/treatments/{treatment}', [TreatmentsController::class, 'update'])->name('treatments.update')->middleware('admin');

});



Auth::routes();


