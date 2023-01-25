<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengarang>
 */
class PengarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_pengarang' => $this->faker->name('female'),

            'telp' => $this->faker->phoneNumber(),


            'alamat' => $this->faker->address()
        ];
    }
}
