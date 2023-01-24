<?php

namespace App\Http\Controllers\API;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
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

        $password = Hash::make($input['password']);

        $petugas = Petugas::create([
            'nama_petugas' => $input['nama_petugas'],
            'username' => $input['username'],
            'telp' => $input['telp'],
            'alamat' => $input['alamat'],
            'password' => $password
        ]);
        return response()->json([
            'status' => true,
            'data' => [
                'nama_petugas' => $petugas->nama_petugas,
                'username' => $petugas->username,
                'telp' => $petugas->telp,
                'alamat' => $petugas->alamat,
                'created_at' => $petugas->created_at,
                'updated_at' => $petugas->updated_at
            ]
        ]);
    }
}
