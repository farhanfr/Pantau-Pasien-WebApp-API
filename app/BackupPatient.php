<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BackupPatient extends Model
{
    protected $table = 'patient_backup';
    protected $fillable = ['hospital_id','doctor_id','nurse_id','nik','name','age','address','number_phone','date_inpatient'];
    public $timestamps = FALSE;
}
