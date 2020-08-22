<?php

namespace App\Http\Controllers\Api\AlertCondition;

use App\AlertConditionPatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllByIdController extends Controller
{
    public function __invoke(Request $request)
    {
        $id=$request->input('id');
        if ($dataAlert=AlertConditionPatient::where('id','=',$id)->get()){
            if (count($dataAlert) != 0){
                return $this->response()->successData('success get data','data',$dataAlert);
            }
            else{
                return $this->response()->failMessage('data not found');
            }
        }
        else{
            return $this->response()->failMessage('failed get data');
        }
    }
}
