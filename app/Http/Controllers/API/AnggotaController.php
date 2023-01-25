<?php

namespace App\Http\Controllers\API;

use App\Models\Anggota;
use App\Jobs\AnggotaJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'telp' => 'required',

            'alamat' => 'required'

        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $anggota = Anggota::create($input);
        return response()->json([
            'status' => true,
            'data' => $anggota
        ]);
    }

    public function createAnggotaBanyak()
    {
        $startTime = microtime(true);

        // ! JOB
        $job = new AnggotaJob();
        $this->dispatch($job);

        $endTime = microtime(true);

        $rangeTime = $endTime - $startTime;

        return response()->json([
            'status' => true,
            'message' => 'Data selesai dibuat dalam ' . $rangeTime . ' detik'
        ]);
    }
}
