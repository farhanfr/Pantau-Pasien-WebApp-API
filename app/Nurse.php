<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $table = 'nurse';
    protected $fillable = ['hospital_id','name','address','password','number_phone','photo'];
    public $timestamps = FALSE;
}
