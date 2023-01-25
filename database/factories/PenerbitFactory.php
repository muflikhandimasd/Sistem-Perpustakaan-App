<?php

namespace Database\Factories;

use App\Models\Penerbit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penerbit>
 */
class PenerbitFactory extends Factory
{

    protected $model = Penerbit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_penerbit' => $this->faker->name('female'),

            'telp' => $this->faker->phoneNumber(),


            'alamat' => $this->faker->address()
        ];
    }
}
