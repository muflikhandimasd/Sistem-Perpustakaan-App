<?php

namespace App\Http\Controllers\API;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Petugas;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{

    public function update(Request $request, $id)
    {
        $input = $request->only(['tanggal_pinjam', 'anggota_id', 'petugas_id']);


        if (isset($input['anggota_id'])) {
            $anggota = Anggota::find($input['anggota_id']);
            if (!$anggota) {
                return response()->json([
                    'status' => false,
                    'message' => 'Anggota not found'
                ], 404);
            }
        }
        if (isset($input['petugas_id'])) {
            $petugas = Petugas::find($input['petugas_id']);
            if (!$petugas) {
                return response()->json([
                    'status' => false,
                    'message' => 'Petugas not found'
                ], 404);
            }
        }




        $peminjaman = Peminjaman::find($id);
        if (!$peminjaman) {
            return response()->json([
                'status' => false,
                'message' => 'peminjaman not found'
            ], 404);
        }

        $peminjaman->update($input);
        return response()->json([
            'status' => true,
            'data' => $peminjaman
        ]);
    }
    public function create(Request $request)
    {
        $input = $request->all();
        $rules = [
            'tanggal_pinjam' => 'required|date',
            'anggota_id' => 'required',
            'petugas_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $anggota = Anggota::find($input['anggota_id']);
        if (!$anggota) {
            return response()->json([
                'status' => false,
                'message' => 'Anggota not found'
            ], 404);
        }

        $petugas = Petugas::find($input['petugas_id']);
        if (!$petugas) {
            return response()->json([
                'status' => false,
                'message' => 'Petugas not found'
            ], 404);
        }

        $peminjaman = Peminjaman::create($input);
        return response()->json([
            'status' => true,
            'data' => $peminjaman
        ]);
    }

    public function createPeminjamanDetail(Request $request)
    {
        $input = $request->all();
        $rules = [
            'buku_id' => 'required',
            'peminjaman_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }
        $buku_ids = array();
        foreach ($input['buku_id'] as  $value) {
            $buku = Buku::find($value);
            if (!$buku) {
                return response()->json([
                    'status' => false,
                    'message' => 'buku not found'
                ], 404);
            } else {
                $buku_ids[] = $value;
            }
        }


        $peminjaman = Peminjaman::find($input['peminjaman_id']);
        if (!$peminjaman) {
            return response()->json([
                'status' => false,
                'message' => 'Peminjaman not found'
            ], 404);
        }

        $peminjaman->bukus()->attach($buku_ids);

        $tanggalPinjam = null;
        $juduls = array();

        $tanggalPinjam =   $peminjaman->tanggal_pinjam;
        foreach ($peminjaman->bukus as $buku) {
            $juduls[] = $buku->judul_buku;
        }

        return response()->json([
            'status' => true,
            'tanggal_pinjam' => $tanggalPinjam,
            'judul' => $juduls
        ]);
    }

    public function index()
    {
        $peminjamans = Peminjaman::with('bukus')->get();

        return response()->json([
            'status' => true,
            'data' => $peminjamans
        ]);
    }


    public function show(Request $request)
    {
        $input = $request->all();
        $rules = [

            'peminjaman_id' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }
        $peminjaman = Peminjaman::find($input['peminjaman_id']);
        if (!$peminjaman) {
            return response()->json([
                'status' => false,
                'message' => 'Peminjaman not found'
            ], 404);
        }
        $tanggalPinjam = null;
        $juduls = array();

        $tanggalPinjam =   $peminjaman->tanggal_pinjam;
        foreach ($peminjaman->bukus as $buku) {
            $juduls[] = $buku->judul_buku;
        }

        return response()->json([
            'status' => true,
            'tanggal_pinjam' => $tanggalPinjam,
            'judul_buku' => $juduls
        ]);
    }
}
