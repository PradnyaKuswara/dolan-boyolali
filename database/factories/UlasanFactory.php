<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Wisata;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::where('is_admin', 0)->pluck('id')->random(),
            'wisata_id' => Wisata::pluck('id')->random(),
            'tanggal_ulasan' => $this->faker->date(),
            'komentar' => $this->faker->paragraph
            

        ];
    }
}
