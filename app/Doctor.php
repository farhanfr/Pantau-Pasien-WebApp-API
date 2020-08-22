<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctor';
    protected $fillable = ['hospital_id','name','address','number_phone','specialist','photo'];
    public $timestamps = FALSE;
}
