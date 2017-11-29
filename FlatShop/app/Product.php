<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable
{
    use Notifiable;

    protected $table = 'product_detail';

    protected $fillable = [
        'productID','productname','descipsion','price','saleprice','pictures','quantuminstock','categoryID','ownerID','dateofbirth','dateofend','isActive'
    ];

    protected $primaryKey = 'productID';
    public $incrementing = false;
    public $timestamps = false;
     public function category(){
        
    }
}
