<?php

namespace Database\Factories;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{

    protected $model = Anggota::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_anggota' => $this->faker->name(),
            'jenis_kelamin' => 'P',
            'telp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address()
        ];
    }
}
