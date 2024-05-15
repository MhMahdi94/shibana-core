<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'meal_id',
        'resturant_id',
        'variation_id',
        'option_id',
        'price',
        'quantity',
    ];
    public function meal(){
        return $this->belongsTo(Meal::class,'meal_id');
    }
    public function user(){
        return $this->belongsTo(Customer::class,'user_id');
    }

    public function resturant(){
        return $this->belongsTo(Resturaunt::class,'resturant_id');
    }
    public function variation(){
        return $this->belongsTo(Variation::class,'variation_id');
    }
    public function option(){
        return $this->belongsTo(VariationOption::class,'option_id');
    }
}
