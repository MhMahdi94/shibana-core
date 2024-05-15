<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'category_id',
        'resturant_id',
        'price',
        'image'
    ];
    public function resturant(){
        return $this->belongsTo(Resturaunt::class,'resturant_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

   
}
