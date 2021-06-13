<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLogs extends Model
{
    use HasFactory;

    protected $table = 'book_logs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_peminjam',
        'id_buku',
        'status',
        'jumlah',
        'tanggal_ambil',
        'tanggal_kembali'
    ];

    public function book()
    {
        return $this->hasMany(Book::class, 'id', 'id_buku');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'id_peminjam');
    }
}
