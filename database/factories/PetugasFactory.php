<?php

namespace Database\Factories;

use App\Models\Petugas;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{

    protected $model = Petugas::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition()
    {
        return [
            'nama_petugas' => $this->faker->name('male'),

            'telp' => $this->faker->phoneNumber(),
            'username' => $this->faker->userName(),
            'password' => Hash::make(Str::random(10)),

            'alamat' => $this->faker->address()
        ];
    }
}
