<?php

namespace App\Http\Controllers\Usual\Patient;

use App\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $data = Patient::find($id);
        try{
            $data->delete();
            return redirect('patient')->with(['msgSuccessDelPat'=>'Berhasil Hapus Pasien']);
        }catch (Exception $exception){
            return redirect('patient')->with(['msgFailDelPat'=>$exception->getMessage()]);
        }
    }
}
