<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'userID','username','password','email','firtname','lastname','mediaID','gender','dateofbirth','typeofuser','dateofcreate','isActive'
    ];

    protected $primaryKey = 'userID';    
    public $timestamps = false;

    public function product(){
        return $this->belongsToMany('App\Product','order_detail','userID','productID');    
    }    
}
