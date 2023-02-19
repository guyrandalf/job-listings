<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

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

// All Listing
Route::get('/', [ListingController::class, 'index'])->name('listings.index');


// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth')->name('listings.create');

// Store listing information
Route::post('/listings/store', [ListingController::class, 'store'])->middleware('auth')->name('listings.store');


// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

// Show edit form
Route::get('/listings/edit/{id}', [ListingController::class, 'edit'])->middleware('auth')->name('listings.edit');

Route::patch('/listings/{id}', [ListingController::class, 'update'])->middleware('auth')->name('listings.update');

Route::get('/mylistings', [ListingController::class, 'manage'])->middleware('auth')->name('user.listings');

Route::delete('/listings/{id}', [ListingController::class, 'destroy'])->middleware('auth')->name('listings.delete');

Route::get('/register', [UserController::class, 'register'])->middleware('guest')->name('user.register');

Route::post('/register/store', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('user.login');


Route::post('/login/loginUser', [UserController::class, 'loginUser'])->name('user.loginUser');

// Log out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('user.logout');
