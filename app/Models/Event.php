<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'event';

    protected $fillable = [
        'nama_event',
        'tanggal_event',
        'lokasi_event',
        'deskripsi_event',
        'foto_event',
    ];

    public function fotoEvent(): string
    {
        return Storage::url($this->foto_event);
    }

    public function galeris(): BelongsToMany
    {
        return $this->belongsToMany(Galeri::class)->withTimestamps();
    }
}
