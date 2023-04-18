<?php

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



// LOGIN ADMIN ROTUES

Route::get('/', 'App\Http\Controllers\LoginController@login')->name('login.view');

Route::post('/', 'App\Http\Controllers\LoginController@authenticate')->name('admin.login');

Route::get('/logoutadmin', 'App\Http\Controllers\LoginController@logoutAdmin')->name('logout.view');

Route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.index')->middleware('auth');

Route::get('/find', 'App\Http\Controllers\GuestController@find')->name('guest.find');

Route::post('/dashboard', 'App\Http\Controllers\GuestController@insert')->name('guest.store')->middleware('auth');
