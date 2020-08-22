<?php

namespace App\Http\Controllers\Usual\Patient;

use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class AddController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'doctor_id'=>$request->input('doctor_id'),
            'nurse_id'=>$request->input('nurse_id'),
            'nik'=>$request->input('name'),
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'number_phone'=>$request->input('number_phone'),
            'password'=>$request->input('password'),
            'photo'=>$request->file('photo')
        ];

        try{
            $this->create($data);
            return redirect('patient')->with(['msgSuccessAddPat'=>'Berhasil Menambah Pasien']);
        }catch (Exception $exception){
            return redirect('patient')->with(['msgFailedAddPat'=>$exception->getMessage()]);
        }
    }

    public function create($data){
        $file = $data['photo'];
        if ($file == null){
            Patient::insert([
                'hospital_id'=>1,
                'doctor_id'=>'a',
                'nurse_id'=>'a',
                'nik'=>'a',
                'name'=>$data['name'],
                'address'=>$data['address'],
                'number_phone'=>$data['number_phone'],
                'password'=>Hash::make($data['password']),
                'photo'=>'noimg.png'
            ]);
        }else{
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);
            Patient::insert([
                'hospital_id'=>1,
                'doctor_id'=>'a',
                'nurse_id'=>'a',
                'nik'=>'a',
                'name'=>$data['name'],
                'address'=>$data['address'],
                'number_phone'=>$data['number_phone'],
                'password'=>Hash::make($data['password']),
                'photo'=>$filename
            ]);
        }
    }
}
