<?php

namespace App\Http\Controllers\Usual\Patient;

use App\Patient;
use App\PatientFamily;
use Carbon\Carbon;
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
            'nik'=>$request->input('nik'),
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'age'=>$request->input('age'),
        ];

        if (!PatientFamily::where('nik','=',$data['nik'])->first()){
            return redirect('patient')->with(['msgFailedAddPat'=>'Nik belum terdaftar']);
        }

            try{
                $this->create($data);
                return redirect('patient')->with(['msgSuccessAddPat'=>'Berhasil Menambah Pasien']);
            }catch (Exception $exception){
                return redirect('patient')->with(['msgFailedAddPat'=>$exception->getMessage()]);
            }



    }

    public function create($data){
        Patient::insert([
            'hospital_id'=>1,
            'doctor_id'=>$data['doctor_id'],
            'nurse_id'=>$data['nurse_id'],
            'nik'=>$data['nik'],
            'name'=>$data['name'],
            'age'=>$data['age'],
            'address'=>$data['address'],
            'date_inpatient'=>Carbon::now()
        ]);
    }
}
