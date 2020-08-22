<?php

namespace App\Http\Controllers\Api\PatientFamily;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PatientFamily;
use Exception;
use Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
    	$data=[
    		'nik'=>$request->input('nik'),
    		'password'=>$request->input('password')
    	];

    	try {
    		$user = $this->login($data);
    		return $this->response()->successData('Login success','data',$user);
    	} catch (Exception $e) {
    		return $this->response()->failMessage([$e->getMessage()]);
    	}
    	
    }

    private function login($data)
    {
    	if (!$user=PatientFamily::where('nik','=',$data['nik'])->first()) {
    		throw new Exception('Nik belum terdaftar');
    	}

    	if (!Hash::check($data['password'], $user->password)) {
    		throw new Exception('Password salah');
    	}

    	return $user;
    }
}
