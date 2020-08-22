<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';
    protected $fillable = ['hospital_id','doctor_id','nurse_id','nik','name','age','address','number_phone','date_inpatient'];
    public $timestamps = FALSE;

    public function hospital()
    {
    	return $this->belongsTo('App\Hospital','hospital_id','id');
    }
}
