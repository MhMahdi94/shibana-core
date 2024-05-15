<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'restuarant_id'
    ];

    public function restuarant(){
        return $this->belongsTo(Resturaunt::class,'restuarant_id');
    }
}
