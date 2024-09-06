<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wisata>
 */
class WisataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_wisata' => $this->faker->name,
            'lokasi_wisata' =>'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3955.3147487932947!2d110.612752!3d-7.5406116!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a69fda63c4935%3A0x11dfc2446247e4b!2sH-TOP%20Cleaning%20Product!5e0!3m2!1sen!2sid!4v1719935535772!5m2!1sen!2sid',
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'deskripsi_wisata' => $this->faker->text,
            'kategori_wisata' => $this->faker->word,
            'foto_wisata' => 'wisata/' . $this->faker->image('public/storage/wisata', 1920, 1080, null, false),
        ];
    }
}