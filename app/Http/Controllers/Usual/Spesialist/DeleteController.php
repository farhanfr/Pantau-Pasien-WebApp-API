<?php

namespace App\Http\Controllers\Usual\Spesialist;

use App\Spesialist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $data = Spesialist::find($id);
        try{
            $data->delete();
            return redirect('spesialist')->with(['msgSuccessDelSpec'=>'Berhasil Hapus spesialis']);
        }catch (Exception $exception){
            return redirect('spesialist')->with(['msgFailDelSpec'=>$exception->getMessage()]);
        }
    }
}
