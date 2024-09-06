<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wisata_id',
        'tanggal_ulasan',
        'komentar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id', 'id');
    }
}
