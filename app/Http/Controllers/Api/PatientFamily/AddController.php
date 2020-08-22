<?php

namespace App\Http\Controllers\Api\PatientFamily;

use App\PatientFamily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Hash;

class AddController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'nik'=>$request->input('nik'),
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'number_phone'=>$request->input('number_phone'),
            'password'=>Hash::make($request->input('password'))
        ];

        try{
            $this->create($data);
            return $this->response()->successMessage('success add data');
        }catch (Exception $exception){
            return $this->response()->failMessage($exception->getMessage());
        }

    }

    private function create($data)
    {
        PatientFamily::insert([
            'nik'=>$data['nik'],
            'name'=>$data['name'],
            'address'=>$data['address'],
            'number_phone'=>$data['number_phone'],
            'password'=>$data['password'],
        ]);
    }
}
