<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->group(['prefix' => 'v1'],function () use ($router) {

    $router->group(['prefix' => 'patientfamily'], function () use($router) {
        $router->post('create',['uses' => 'Api\PatientFamily\AddController']);
        $router->post('login',['uses' => 'Api\PatientFamily\LoginController']);
        $router->get('get/all',['uses' => 'Api\PatientFamily\GetAllController']);
        $router->get('get/all/nik',['uses' => 'Api\PatientFamily\GetAllByNikController']);
    });

    $router->group(['prefix' => 'patient'], function () use($router) {
        $router->get('get/all',['uses' => 'Api\Patient\GetAllController']);
        $router->get('get/all/nik',['uses' => 'Api\Patient\GetAllByNikController']);
    });

    $router->group(['prefix' => 'alertcondition'], function () use($router) {
        $router->get('get/all',['uses' => 'Api\AlertCondition\GetAllController']);
        $router->get('get/all/id',['uses' => 'Api\AlertCondition\GetAllByIdController']);
        $router->get('get/all/nik',['uses' => 'Api\AlertCondition\GetAllByNikController']);
    });




});

