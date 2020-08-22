<?php

namespace App\Http\Controllers\Usual\Doctor;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use PhpParser\Comment\Doc;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $data = Doctor::find($id);
        try{
            $data->delete();
            return redirect('doctor')->with(['msgSuccessDelDoc'=>'Berhasil Hapus Dokter']);
        }catch (Exception $exception){
            return redirect('doctor')->with(['msgFailDelDoc'=>$exception->getMessage()]);
        }
    }
}
