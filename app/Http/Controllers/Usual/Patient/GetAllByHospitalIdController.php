<?php

namespace App\Http\Controllers\Usual\Patient;

use App\Doctor;
use App\Nurse;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GetAllByHospitalIdController extends Controller
{
    public function __invoke()
    {
        $getDoctor = Doctor::where('hospital_id','=',1)->get();
        $getNurse = Nurse::where('hospital_id','=',1)->get();
        $getPatient = DB::table('hospital')
            ->select(DB::raw('patient.*,doctor.name AS name_doctor,nurse.name AS name_nurse'))
            ->join('doctor','hospital.id','=','doctor.hospital_id')
            ->join('nurse','hospital.id','=','nurse.hospital_id')
            ->join('patient','hospital.id','=','patient.hospital_id')
            ->get();
        return view('layouts.hospital.subcontent.patient',compact('getNurse','getDoctor','getPatient'));
    }
}
