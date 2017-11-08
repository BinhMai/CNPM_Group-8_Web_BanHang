<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $fillable = ['id','name','birthday','address','email'];
    protected $primaryKey = 'id';

    public $timestamps = false;
}
