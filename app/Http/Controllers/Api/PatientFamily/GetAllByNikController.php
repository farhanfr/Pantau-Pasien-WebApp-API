<?php

namespace App\Http\Controllers\Api\PatientFamily;

use App\PatientFamily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllByNikController extends Controller
{
    public function __invoke(Request $request)
    {
        $nik=$request->input('nik');
        if ($dataFamily=PatientFamily::where('nik','=',$nik)->first()){
            return $this->response()->successData('success get data','data',$dataFamily);
        }
        else{
            return $this->response()->failMessage('data not found');
        }
    }
}
