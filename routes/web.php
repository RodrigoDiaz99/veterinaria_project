<?php

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

Route::get('/', function () {
    return view('welcome');
});

 Route::middleware(['auth:sanctum', 'verified', 'permission:admin index'])->get('dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    //Route::middleware(['permission:admin index'])->get('appointment', 'appointmentController@index')->name('appointment.index');

    Route::middleware(['permission:admin index'])->get('appointment', 'appointmentController@index')->name('appointment.index');
    Route::middleware(['permission:admin create|create'])->get('appointment/create', 'appointmentController@create')->name('appointment.create');
    Route::middleware(['permission:store'])->post('appointment/store', 'appointmentController@store')->name('appointment.store');
    Route::middleware(['permission:show'])->get('appointment/{id}', 'appointmentController@show')->name('appointment.show');
    Route::middleware(['permission:edit'])->get('appointment/{id}/edit', 'appointmentController@edit')->name('appointment.edit');
    Route::middleware(['permission:update'])->put('appointment/{id}', 'appointmentController@update')->name('appointment.update');
    Route::middleware(['permission:destroy'])->delete('appointment/{id}', 'appointmentController@destroy')->name('appointment.destroy');

    Route::middleware(['permission:admin index'])->get('records', 'recordsController@index')->name('records.index');
    Route::middleware(['permission:admin create'])->get('records/create/{appointment}', 'recordsController@create')->name('records.create');
    Route::middleware(['permission:admin store'])->post('records/store', 'recordsController@store')->name('records.store');
    Route::middleware(['permission:admin attend'])->get('records/{id}/attend', 'recordsController@attend')->name('records.attend');
    Route::middleware(['permission:admin show'])->get('records/{id}', 'recordsController@show')->name('records.show');
    Route::middleware(['permission:admin edit'])->get('records/{id}/edit', 'recordsController@edit')->name('records.edit');
    Route::middleware(['permission:admin update'])->put('records/{id}', 'recordsController@update')->name('records.update');
    Route::middleware(['permission:admin destroy'])->delete('records/{id}', 'recordsController@destroy')->name('records.destroy');

    Route::middleware(['permission:admin index'])->get('pets', 'petsController@index')->name('pets.index');
    Route::middleware(['permission:admin create'])->get('pets/create', 'petsController@create')->name('pets.create');
    Route::middleware(['permission:admin store'])->post('pets/store', 'petsController@store')->name('pets.store');
    Route::middleware(['permission:admin show'])->get('pets/{id}', 'petsController@show')->name('pets.show');
    Route::middleware(['permission:admin edit'])->get('pets/{id}/edit', 'petsController@edit')->name('pets.edit');
    Route::middleware(['permission:admin update'])->put('pets/{id}', 'petsController@update')->name('pets.update');
    Route::middleware(['permission:admin destroy'])->delete('pets/{id}', 'petsController@destroy')->name('pets.destroy');

    Route::middleware(['permission:index'])->get('sellPoint', 'sellPointController@index')->name('sellPoint.index');
    Route::middleware(['permission:create'])->get('sellPoint/create', 'sellPointController@create')->name('sellPoint.create');
    Route::middleware(['permission:store'])->post('sellPoint/store', 'sellPointController@store')->name('sellPoint.store');
    Route::middleware(['permission:show'])->get('sellPoint/{id}', 'sellPointController@show')->name('sellPoint.show');
    Route::middleware(['permission:edit'])->get('sellPoint/{id}/edit', 'sellPointController@edit')->name('sellPoint.edit');
    Route::middleware(['permission:update'])->put('sellPoint/{id}', 'sellPointController@update')->name('sellPoint.update');
    Route::middleware(['permission:destroy'])->delete('sellPoint/{id}', 'sellPointController@destroy')->name('sellPoint.destroy');

    Route::middleware(['permission:admin index'])->get('User', 'UserController@index')->name('user.index');
    Route::middleware(['permission:admin create'])->get('User/create', 'UserController@create')->name('user.create');
    Route::middleware(['permission:admin store'])->post('User/store', 'UserController@store')->name('user.store');
    Route::middleware(['permission:admin show'])->get('User/{id}', 'UserController@show')->name('user.show');
    Route::middleware(['permission:admin edit'])->get('User/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::middleware(['permission:admin update'])->put('User/{id}', 'UserController@update')->name('user.update');
    Route::middleware(['permission:admin destroy'])->delete('User/{id}', 'UserController@destroy')->name('user.destroy');
    
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('calendar', 'calendar')->name('calendar');
});
