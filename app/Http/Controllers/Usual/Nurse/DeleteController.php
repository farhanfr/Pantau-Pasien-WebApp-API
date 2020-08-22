<?php

namespace App\Http\Controllers\Usual\Nurse;

use App\Nurse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $data = Nurse::find($id);
        try{
            $data->delete();
            return redirect('nurse')->with(['msgSuccessDelNur'=>'Berhasil Hapus Perawat']);
        }catch (Exception $exception){
            return redirect('nurse')->with(['msgFailDelNur'=>$exception->getMessage()]);
        }
    }
}
