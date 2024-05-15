<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealsWishlist extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'meal_id'
    ];
    public function meal(){
        return $this->belongsTo(Resturaunt::class,'meal_id');
    }
    public function user(){
        return $this->belongsTo(Customer::class,'user_id');
    }
}
