<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;



    protected $fillable = [
        'order_id',
        'meal_id',
        'price',
        'quantity',
        'variation_id',
        'option_id',
    ];
}
