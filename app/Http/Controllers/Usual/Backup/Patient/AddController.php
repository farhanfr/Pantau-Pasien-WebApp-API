<?php

namespace App\Http\Controllers\Usual\Backup\Patient;

use App\BackupPatient;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class AddController extends Controller
{
    public function __invoke($id)
    {
        $dataPatient = Patient::find($id);

        $data = [
            'doctor_id'=>$dataPatient['doctor_id'],
            'nurse_id'=>$dataPatient['nurse_id'],
            'nik'=>$dataPatient['nik'],
            'name'=>$dataPatient['name'],
            'address'=>$dataPatient['address'],
            'age'=>$dataPatient['age'],
        ];

        BackupPatient::insert([
            'hospital_id'=>1,
            'doctor_id'=>$data['doctor_id'],
            'nurse_id'=>$data['nurse_id'],
            'nik'=>$data['nik'],
            'name'=>$data['name'],
            'age'=>$data['age'],
            'address'=>$data['address'],
            'date_inpatient'=>Carbon::now()
        ]);

        try{
            $dataPatient->delete();
            return redirect('patient')->with(['msgSuccessBacPat'=>'Berhasil backup data pasien']);
        }catch (Exception $exception){
            return redirect('patient')->with(['msgFailDelPat'=>$exception->getMessage()]);
        }
    }
}
