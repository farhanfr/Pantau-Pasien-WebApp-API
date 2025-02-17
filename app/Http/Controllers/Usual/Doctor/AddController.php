<?php

namespace App\Http\Controllers\Usual\Doctor;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class AddController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'hospital_id'=>$request->input('hospital_id'),
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'number_phone'=>$request->input('number_phone'),
            'spesialist_id'=>$request->input('spesialist_id'),
            'photo'=>$request->file('photo')
        ];

        try{
            $this->create($data);
            return redirect('doctor')->with(['msgSuccessAddDoc'=>'Berhasil Menambah Dokter']);
        }catch (Exception $exception){
            return redirect('doctor')->with(['msgFailedAddDoc'=>$exception->getMessage()]);
        }
    }

    public function create($data){
        $file = $data['photo'];
        if ($file == null){
            Doctor::insert([
                'hospital_id'=>1,
                'name'=>$data['name'],
                'address'=>$data['address'],
                'number_phone'=>$data['number_phone'],
                'spesialist_id'=>$data['spesialist_id'],
                'photo'=>'noimg.png'
            ]);
        }else{
            $filename = $file->getClientOriginalName();
            $file->move("img/",$filename);
            Doctor::insert([
                'hospital_id'=>1,
                'name'=>$data['name'],
                'address'=>$data['address'],
                'number_phone'=>$data['number_phone'],
                'spesialist_id'=>$data['spesialist_id'],
                'photo'=>$filename
            ]);
        }
    }
}
