<?php

namespace App\Http\Controllers\Api\AlertCondition;

use App\AlertConditionPatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllByNikController extends Controller
{
    public function __invoke(Request $request)
    {
        $nik=$request->input('nik');
        if ($dataAlert=AlertConditionPatient::with(['patient'])->where('nik','=',$nik)->get()){
            if (count($dataAlert) != 0){
                return $this->response()->successData('success get data','data',$dataAlert);
            }
            else{
                return $this->response()->failMessage('data empty');
            }
        }
        else{
            return $this->response()->failMessage('failed get data');
        }
    }
}
