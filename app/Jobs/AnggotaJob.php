<?php

namespace App\Jobs;

use Faker\Factory;
use App\Models\Anggota;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AnggotaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $faker = Factory::create();
        $totalData = 10000;

        for ($i = 0; $i <= $totalData; $i++) {
            $data = [
                'nama_anggota' => $faker->name(),
                'jenis_kelamin' => 'L',
                'telp' => $faker->phoneNumber(),
                'alamat' => $faker->address()
            ];
            Anggota::create($data);
        }
    }
}
