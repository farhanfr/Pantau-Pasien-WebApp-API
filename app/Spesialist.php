<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spesialist extends Model
{
    protected $table = 'spesialist';
    protected $fillable = ['hospital_id','name','desc'];
    public $timestamps = FALSE;
}
