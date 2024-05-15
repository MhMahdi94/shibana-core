<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResturantWishlist extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'resturant_id'
    ];
    public function resturant(){
        return $this->belongsTo(Resturaunt::class,'resturant_id');
    }
    public function user(){
        return $this->belongsTo(Customer::class,'user_id');
    }
}
