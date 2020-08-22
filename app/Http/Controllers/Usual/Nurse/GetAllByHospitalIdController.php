<?php

namespace App\Http\Controllers\Usual\Nurse;

use App\Nurse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllByHospitalIdController extends Controller
{
    public function __invoke()
    {
        $getNurse = Nurse::where('hospital_id','=',1)->get();
        return view('layouts.hospital.subcontent.nurse',compact('getNurse'));
    }
}
