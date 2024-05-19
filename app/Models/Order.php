<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'resturant_id',
        'address',
        'delivery_date',
        'delivery_time',
        'delivery_notes',
        'price',
        'vat',
        'delivery',
        'total_price',
        'payment_status',
    ];

    public function resturant(){
        return $this->belongsTo(Resturaunt::class,'resturant_id');
    }
    public function user(){
        return $this->belongsTo(Customer::class,'user_id');
    }

    public function status(){
        return $this->belongsTo(OrderStatus::class,'order_status');
    }
}
