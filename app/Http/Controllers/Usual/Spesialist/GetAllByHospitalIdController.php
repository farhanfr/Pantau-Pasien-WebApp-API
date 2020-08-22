<?php

namespace App\Http\Controllers\Usual\Spesialist;

use App\Spesialist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllByHospitalIdController extends Controller
{
    public function __invoke()
    {
        $getSpesialist = Spesialist::where('hospital_id','=',1)->get();
        return view('layouts.hospital.subcontent.spesialism',compact('getSpesialist'));
    }
}
