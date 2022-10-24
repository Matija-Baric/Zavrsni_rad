<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//All Listings
Route::get('/', [ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Create Reservation
Route::get('/listings/{listing}/create-reservation', [ListingController::class, 'reservation'])->middleware('auth');

//Store Reservation
Route::post('/reservation/{listing}', [ListingController::class, 'store_reservation'])->middleware('auth');

//Delete Listing
Route::delete('/reservation/{reservation}', [ListingController::class,'delete_reservation'])->middleware('auth');

//Log in User SCHEDULEEE
Route::post('/reservation/authenticate', [ListingController::class, 'authenticate']);

/* 
//Serached reservations
Route::get('/searched_reservations', [ListingController::class, 'searched_reservations']); */


//Show EDIT Form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Reservation schedule
Route::get('/listings/{listing}/reservation_schedule', [ListingController::class, 'schedule']);



//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

