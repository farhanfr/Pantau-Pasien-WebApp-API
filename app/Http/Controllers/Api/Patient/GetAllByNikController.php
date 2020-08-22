<?php

namespace App\Http\Controllers\Api\Patient;

use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllByNikController extends Controller
{
    public function __invoke(Request $request)
    {
        $nik=$request->input('nik');
        if ($dataPatient=Patient::with(['hospital'])->where('nik','=',$nik)->get()){
            if (count($dataPatient) != 0){
                return $this->response()->successData('success get data','data',$dataPatient);
            }
            else{
                return $this->response()->failMessage('empty data');
            }
        }
        else{
            return $this->response()->failMessage('data not found');
        }
    }
}
