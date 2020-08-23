<?php

namespace App\Http\Controllers\Usual\Backup\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GetAllByHospitalIdController extends Controller
{
    public function __invoke()
    {
        $getBackup = DB::table('hospital')
            ->select(DB::raw('patient_backup.*,doctor.name AS name_doctor,nurse.name AS name_nurse'))
            ->join('doctor','hospital.id','=','doctor.hospital_id')
            ->join('nurse','hospital.id','=','nurse.hospital_id')
            ->join('patient_backup','hospital.id','=','patient_backup.hospital_id')
            ->get();
        return view('layouts.hospital.subcontent.backup',compact('getBackup'));
    }
}
