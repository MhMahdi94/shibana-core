<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'meal_id',
        'resturant_id',
        'variation_id',
        'value',
    ];
}
