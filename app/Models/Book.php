<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class   Book extends Model
{
    use HasFactory;

    public function genre(): BelongsTo{
        return $this->belongsTo(Genre::class, 'genreID');
    }

    public function publisher(): BelongsTo{
        return $this->belongsTo(Publisher::class, 'publisherID');
    }

    public function transactiondetails(){
        return $this->hasMany(TransactionDetail::class, 'book_id');
    }
}
