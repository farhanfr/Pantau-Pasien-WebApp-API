<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospital';
    protected $fillable = ['name','email','password','address','isVerified'];
    public $timestamps = FALSE;
}
