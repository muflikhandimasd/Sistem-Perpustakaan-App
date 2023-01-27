<?php

namespace App\Http\Controllers\WEB;

use App\Models\Anggota;
use App\Models\Petugas;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class WebPeminjamanController extends Controller
{

    public function update(Request $request, $id)
    {
        $input = $request->only(['tanggal_pinjam', 'anggota_id', 'petugas_id']);


        Anggota::findOrFail($input['anggota_id']);


        Petugas::findOrFail($input['petugas_id']);




        $peminjaman = Peminjaman::findOrFail($id);
        if (isset($input['tanggal_pinjam'])) {
            $formatted = Carbon::parse($input['tanggal_pinjam'])->format('Y-m-d');

            $input['tanggal_pinjam'] = $formatted;
        }

        $peminjaman->update($input);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diupdate');
    }

    public function create()
    {
        $title = 'Tambah Peminjaman';
        $anggotas = Anggota::all();
        $petugas = Petugas::all();

        return view('peminjaman.create', compact('title', 'anggotas', 'petugas'));
    }
    public function store(Request $request)
    {
        $input = $request->only('tanggal_pinjam', 'anggota_id', 'petugas_id');
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'anggota_id' => 'required',
            'petugas_id' => 'required',
        ]);

        $formatted = Carbon::parse($input['tanggal_pinjam'])->format('Y-m-d');

        $input['tanggal_pinjam'] = $formatted;


        Anggota::findOrFail($input['anggota_id']);


        Petugas::findOrFail($input['petugas_id']);


        Peminjaman::create($input);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman selesai dibuat');
    }


    public function index()
    {
        $peminjamans = Peminjaman::latest()->paginate(10);
        $title = 'Peminjaman';
        return view('peminjaman.index', compact('peminjamans', 'title'))->with('i', (request()->query('page', 1) - 1) * 10);
    }

    public function edit($id)
    {
        $title = 'Peminjaman Buku';
        $peminjaman = Peminjaman::findOrFail($id);
        $anggotas = Anggota::all();
        $petugas = Petugas::all();
        return view('peminjaman.edit', compact('title', 'peminjaman', 'anggotas', 'petugas'));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Berhasil menghapus peminjaman');
    }
}
