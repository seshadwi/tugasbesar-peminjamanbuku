<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "book";

    public function book_logs()
    {
        return $this->hasMany(Book_logs::class);
    }
}
