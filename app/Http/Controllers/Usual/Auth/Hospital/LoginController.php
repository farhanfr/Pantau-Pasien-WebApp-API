<?php

namespace App\Http\Controllers\Usual\Auth\Hospital;

use App\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];

        try{
            $this->login($data);
            return redirect('hospitaldashboard');
        }catch (Exception $exception){
            return redirect('/')->with(['msgFailLogin'=>$exception->getMessage()]);
        }
    }

    public function login($data){
        if ($userHospital = Hospital::where('email','=',$data['email'])->first()){
            if (!Hash::check($data['password'],$userHospital->password)){
                throw new Exception('password salah');
            }
            else{
                Session::put('idHospital',$userHospital->id);
                Session::put('name',$userHospital->name);
                Session::put('isLogin',TRUE);
            }
        }
        else{
            throw new Exception('email belum terdaftar');
        }
    }
}
