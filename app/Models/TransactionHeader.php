<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    public function transactiondetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
