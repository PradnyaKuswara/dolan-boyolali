<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;


class Wisata extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'wisata';

    protected $fillable = [
        'nama_wisata',
        'lokasi_wisata',
        'latitude',
        'longitude',
        'deskripsi_wisata',
        'kategori_wisata',
        'foto_wisata',
    ];

    public function ulasans(): HasMany
    {
        return $this->hasMany(Ulasan::class);
    }

    public function fotoWisata(): string
    {
        return Storage::url($this->foto_wisata);
    }

    public function galeris (): BelongsToMany
    {
        return $this->belongsToMany(Galeri::class)->withTimestamps();
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Radius bumi dalam kilometer
    
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
    
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
    
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        $distance = $earthRadius * $c;
        return round($distance, 2); // Membulatkan jarak ke dua desimal
    }
    
}