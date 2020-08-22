<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlertConditionPatient extends Model
{
    protected $table = 'alert_condition_patient';
    protected $fillable = ['nurse_id','patient_id','nik','color','title','message','datepost'];
    public $timestamps = FALSE;

    public function patient()
    {
    	return $this->belongsTo('App\Patient','patient_id','id');
    }
}
