<?php

namespace App\Http\Controllers\Usual\Doctor;

use App\Doctor;
use App\Spesialist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GetAllByHospitalIdController extends Controller
{
    public function __invoke()
    {
        $getSpesialist = Spesialist::where('hospital_id','=',1)->get();
        $getDoctor = DB::table('spesialist')
            ->select(DB::raw('doctor.*,spesialist.name AS name_spesialist'))
            ->join('doctor', 'spesialist.id', '=', 'doctor.spesialist_id')
            ->get();
        return view('layouts.hospital.subcontent.doctor',compact('getDoctor','getSpesialist'));
    }
}
