<?php

namespace App\Http\Controllers\WEB;

use App\Models\Anggota;
use App\Models\Petugas;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebPeminjamanController extends Controller
{

    public function update(Request $request, $id)
    {
        $input = $request->only(['tanggal_pinjam', 'anggota_id', 'petugas_id']);


        Anggota::findOrFail($input['anggota_id']);


        Petugas::findOrFail($input['petugas_id']);




        $peminjaman = Peminjaman::findOrFail($id);

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


        Anggota::findOrFail($input['anggota_id']);


        Petugas::findOrFail($input['petugas_id']);


        Peminjaman::create($input);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman selesai dibuat');
    }


    public function index()
    {
        $peminjamans = Peminjaman::latest()->paginate(10);
        $title = 'Peminjaman';
        return view('peminjaman.index', compact('peminjamans', 'title'));
    }

    public function edit()
    {
        $title = 'Peminjaman Buku';
        return view('peminjaman.edit', compact('titlr'));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Berhasil menghapus peminjaman');
    }
}
