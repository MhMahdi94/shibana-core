<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'operation_id',
        'amount'
    ];

    public function user(){
        return $this->belongsTo(Customer::class,'user_id');
    }

    public function operation(){
        return $this->belongsTo(WalletOperation::class,'operation_id');
    }
}
