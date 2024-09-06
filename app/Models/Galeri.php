<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Galeri extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'galeri';

    protected $fillable = [
        'image',
    ];

    public function fotoGaleri(): string
    {
        return Storage::url($this->image);
    }

    public function wisatas(): BelongsToMany
    {
        return $this->belongsToMany(Wisata::class)->withTimestamps();
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }
}
