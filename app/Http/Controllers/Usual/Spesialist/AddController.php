<?php

namespace App\Http\Controllers\Usual\Spesialist;

use App\Spesialist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class AddController extends Controller
{
    public function __invoke(Request $request)
    {
        $data=[
            'name'=>$request->input('name'),
            'desc'=>$request->input('desc')
        ];

        try{
            $this->create($data);
            return redirect('spesialist')->with(['msgSuccessAddSpec'=>'Berhasil Menambah Spesialis']);
        }catch (Exception $exception){
            return redirect('spesialist')->with(['msgFailedAddSpec'=>$exception->getMessage()]);
        }
    }

    public function create($data){
        Spesialist::insert([
            'hospital_id'=>1,
            'name'=>$data['name'],
            'desc'=>$data['desc']
        ]);
    }
}
