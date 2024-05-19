<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'account_no',
        'mobile_no',
        'balance',
        'status',
    ];

    public function user(){
        return $this->belongsTo(Customer::class,'user_id');
    }
}
