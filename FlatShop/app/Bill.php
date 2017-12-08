<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Bill extends Authenticatable
{
    use Notifiable;

    protected $table = 'bill_detail';

    protected $fillable = [
        'bill_ID','name','dateofbirth','adress','telephone','email','dateofbirth','isActive'
    ];

    protected $primaryKey = 'bill_ID';
    public $timestamps = false;  

    public function ProductBill(){
    	return $this->belongsToMany('App\product','order_detail','bill_ID','productID');
    } 
}
