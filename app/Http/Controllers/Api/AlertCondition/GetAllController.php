<?php

namespace App\Http\Controllers\Api\AlertCondition;

use App\AlertConditionPatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllController extends Controller
{
    public function __invoke()
    {
        $dataAlert = AlertConditionPatient::all();
        return $this->response()->successData('success get data','data',$dataAlert);
    }
}
