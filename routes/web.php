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
Route::get('/', function () {
    return view('layouts.hospital.auth.login_hospital');
});
Route::get('registerhospital', function () {
    return view('layouts.hospital.auth.register_hospital');
});
Route::post('addhospital','Usual\Auth\Hospital\RegisterController');
Route::post('loginhospital','Usual\Auth\Hospital\LoginController');

//Dashbaord
Route::get('hospitaldashboard', function () {
    return view('layouts.hospital.subcontent.dashboard');
});
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

//Patient
Route::get('patient','Usual\Patient\GetAllByHospitalIdController');
Route::post('addpatient','Usual\Patient\AddController');
Route::get('deletedoctor/{id}','Usual\Patient\DeleteController');

//Backup
Route::get('patientbackup','Usual\Backup\Patient\GetAllByHospitalIdController');
Route::get('addbackup/{id}','Usual\Backup\Patient\AddController');
Route::get('deletebackuppatient/{id}','Usual\Backup\Patient\DeleteController');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
