<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{

    protected $model = Buku::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul_buku' => $this->faker->title(),
            'tahun_terbit' =>  $this->faker->year(),
            'jumlah' => '1',
            'isbn' => Str::random(10),
            'pengarang_id' => '1',
            'penerbit_id' => '1',
            'rak_id' => '1'
        ];
    }
}
