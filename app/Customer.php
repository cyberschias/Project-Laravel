<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table ='customers';
    protected $fillable = array('id','firstname','lastname','email','birthday','telephone','cellphone','password','ip');
}
