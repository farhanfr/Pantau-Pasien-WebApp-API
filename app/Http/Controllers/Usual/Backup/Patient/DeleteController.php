<?php

namespace App\Http\Controllers\Usual\Backup\Patient;

use App\BackupPatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $dataPatient = BackupPatient::find($id);

        try{
            $dataPatient->delete();
            return redirect('patientbackup')->with(['msgSuccessDelBac'=>'Berhasil hapus backup data pasien']);
        }catch (Exception $exception){
            return redirect('patientbackup')->with(['msgFailDelBac'=>$exception->getMessage()]);
        }
    }
}
