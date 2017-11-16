<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable
{
    use Notifiable;

    protected $table = 'order_detail';

    protected $fillable = [
        'orderID','userID','dateofbirth','coupon','dateofend','price','isActive'
    ];

    protected $primaryKey = 'orderID';

}
