<?php

namespace App\Http\Controllers\Api\PatientFamily;

use App\PatientFamily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllController extends Controller
{
    public function __invoke()
    {
        $dataFamily = PatientFamily::all();
        return $this->response()->successData('Success get data','data',$dataFamily);
    }
}
