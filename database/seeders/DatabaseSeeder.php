<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Rak;
use App\Models\Anggota;
use App\Models\Petugas;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Anggota::factory(50)->create();
        // Petugas::factory(200)->create();
        // Pengarang::factory(200)->create();
        // Penerbit::factory(200)->create();
        Rak::factory(200)->create();
    }
}
