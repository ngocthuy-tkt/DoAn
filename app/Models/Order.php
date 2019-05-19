<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'phone', 'email', 'address', 'note', 'payment_type', 'total_money_order', 'order_status'
    ];
}
