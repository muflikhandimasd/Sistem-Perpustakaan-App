<?php

namespace Database\Factories;

use App\Models\Pengembalian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengembalian>
 */
class PengembalianFactory extends Factory
{
    protected $model = Pengembalian::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'denda' => rand(10, 50),
            'tanggal_pengembalian' => $this->faker->date(),
            'peminjaman_id' => '1',
            'petugas_id' => '1',
            'anggota_id' => '1'
        ];
    }
}
