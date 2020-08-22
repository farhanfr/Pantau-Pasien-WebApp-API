<?php

namespace App\Http\Controllers\Usual\Nurse;

use App\Nurse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;

class AddController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'number_phone'=>$request->input('number_phone'),
            'password'=>$request->input('password'),
            'photo'=>$request->file('photo')
        ];

        try{
            $this->create($data);
            return redirect('nurse')->with(['msgSuccessAddNur'=>'Berhasil Menambah Perawat']);
        }catch (Exception $exception){
            return redirect('nurse')->with(['msgFailedAddNur'=>$exception->getMessage()]);
        }
    }

    public function create($data){
        $file = $data['photo'];
        if ($file == null){
            Nurse::insert([
                'hospital_id'=>1,
                'name'=>$data['name'],
                'address'=>$data['address'],
                'number_phone'=>$data['number_phone'],
                'password'=>Hash::make($data['password']),
                'photo'=>'noimg.png'
            ]);
        }else{
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);
            Nurse::insert([
                'hospital_id'=>1,
                'name'=>$data['name'],
                'address'=>$data['address'],
                'number_phone'=>$data['number_phone'],
                'password'=>$data['password'],
                'photo'=>$filename
            ]);
        }
    }
}
