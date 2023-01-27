<?php

namespace App\Http\Controllers\WEB;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WebPeminjamanDetailController extends Controller
{
    public function index()
    {
        // $peminjamanDetails = DB::table('peminjaman_details')
        //     ->join('peminjamans', 'peminjaman_details.peminjaman_id', '=', 'peminjamans.id')->join('anggotas', 'peminjamans.anggota_id', '=', 'anggotas.id')->join('petugas', 'peminjamans.petugas_id', '=', 'petugas.id')
        //     ->join('bukus', 'peminjaman_details.buku_id', '=', 'bukus.id')
        //     ->select('peminjaman_details.id', 'bukus.judul_buku', 'peminjamans.tanggal_pinjam', 'peminjamans.tanggal_kembali', 'anggotas.nama_anggota', 'petugas.nama_petugas')
        //     ->orderByDesc('id')->paginate(10);
        $peminjamans = Peminjaman::orderBy('id', 'asc')->paginate(10);
        $title = 'Peminjaman Detail';

        // dd($peminjamanDetails);
        return view('peminjaman_detail.index', compact('peminjamans', 'title'))->with('i', (request()->query('page', 1) - 1) * 10);
    }
}
