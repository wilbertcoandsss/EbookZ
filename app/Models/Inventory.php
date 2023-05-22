<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public function books(){
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
