<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturaunt extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'owner_name',
        'address',
        'image',
        'cover',
        'mobile_no',
        'email',
        'cuisine_id',
        'account_id',
        'latitude',
        'longitude'
    ]; 
}
