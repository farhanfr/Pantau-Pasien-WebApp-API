<?php

namespace App\Http\Controllers\Api\Patient;

use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllController extends Controller
{
    public function __invoke()
    {
        $dataPatient = Patient::all();
        return $this->response()->successData('success get data','data',$dataPatient);
    }
}
