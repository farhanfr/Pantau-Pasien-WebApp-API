<?php

namespace App\Http\Controllers\Usual\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'hospital_id'=>$request->input('hospital_id')
        ];
    }
}
