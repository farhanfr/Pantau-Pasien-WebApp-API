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

//Spesialist
Route::post('addspecialist','Usual\Spesialist\AddController');
Route::get('spesialist','Usual\Spesialist\GetAllByHospitalIdController');
Route::get('deletespecialsit/{id}','Usual\Spesialist\DeleteController');

//Doctor
Route::get('doctor', 'Usual\Doctor\GetAllByHospitalIdController');
Route::post('adddoctor','Usual\Doctor\AddController');
Route::get('deletedoctor/{id}','Usual\Doctor\DeleteController');

//Nurse
Route::get('nurse','Usual\Nurse\GetAllByHospitalIdController');
Route::post('addnurse','Usual\Nurse\AddController');
Route::get('deletenurse/{id}','Usual\Nurse\DeleteController');

//===================
Route::get('/', function () {
    return view('layouts.hospital.subcontent.dashboard');
});

Route::get('patient', function () {
    return view('layouts.hospital.subcontent.patient');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
