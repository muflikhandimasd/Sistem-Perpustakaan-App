<?php

namespace App\Http\Controllers\API;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'jumlah' => 'required',
            'isbn' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'rak_id' => 'required'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $pengarang = Pengarang::find($input['pengarang_id']);
        if (!$pengarang) {
            return response()->json([
                'status' => false,
                'message' => 'Pengarang not found'
            ], 404);
        }
        $penerbit = Penerbit::find($input['penerbit_id']);
        if (!$penerbit) {
            return response()->json([
                'status' => false,
                'message' => 'Penerbit not found'
            ], 404);
        }

        $rak = Rak::find($input['rak_id']);
        if (!$rak) {
            return response()->json([
                'status' => false,
                'message' => 'Rak not found'
            ], 404);
        }


        $buku = Buku::create($input);
        return response()->json([
            'status' => true,
            'data' => $buku,

        ]);
    }

    public function index()
    {
        $buku = Buku::with('pengarang')->with('penerbit')->with('rak')->get();
        return response()->json([
            'status' => true,
            'data' => $buku
        ]);
    }
}
