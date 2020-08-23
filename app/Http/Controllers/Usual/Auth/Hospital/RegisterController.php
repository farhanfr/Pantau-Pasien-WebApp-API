<?php

namespace App\Http\Controllers\Usual\Auth\Hospital;

use App\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'address'=>$request->input('address'),
            'password'=>$request->input('password')
        ];

        try{
            $this->create($data);
            return redirect('registerhospital')->with(['msgSuccessReg'=>'Berhasil Registerasi']);
        }catch (Exception $exception){
            return redirect('registerhospital')->with(['msgFailedReg'=>$exception->getMessage()]);
        }
    }

    public function create($data){
        Hospital::insert([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'address'=>$data['address'],
            'password'=>Hash::make($data['password']),
            'isVerified'=>0
        ]);
    }
}
