<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_logs extends Model
{
    use HasFactory;

    protected $table = 'book_logs';

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
