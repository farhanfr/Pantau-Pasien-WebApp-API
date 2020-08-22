<?php

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
//====================Hospital====================

//Auth

//route
Route::get('/', function () {
    return view('layouts.hospital.subcontent.dashboard');
});
Route::get('spesialism', function () {
    return view('layouts.hospital.subcontent.spesialism');
});
Route::get('doctor', function () {
    return view('layouts.hospital.subcontent.doctor');
});
Route::get('nurse', function () {
    return view('layouts.hospital.subcontent.nurse');
});
Route::get('patient', function () {
    return view('layouts.hospital.subcontent.patient');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
