<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientFamily extends Model
{
    protected $table = 'patient_family';
    protected $fillable = ['nik','name','address','number_phone','photo'];
    public $timestamps = FALSE;
}
