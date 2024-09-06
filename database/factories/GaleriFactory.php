<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Wisata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Galeri>
 */
class GaleriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //event id form model Event
            'event_id' => Event::pluck('id')->random(),
            'wisata_id' => Wisata::pluck('id')->random(),
            'nama_galeri' => $this->faker->name,
            'lokasi_galeri' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3955.3147487932947!2d110.612752!3d-7.5406116!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a69fda63c4935%3A0x11dfc2446247e4b!2sH-TOP%20Cleaning%20Product!5e0!3m2!1sen!2sid!4v1719935535772!5m2!1sen!2sid',
            'foto_galeri' => 'galeri/'.$this->faker->image('public/storage/galeri', 1920, 1080, null, false),
            'deskripsi_galeri' => $this->faker->paragraph,
        ];
    }
}
