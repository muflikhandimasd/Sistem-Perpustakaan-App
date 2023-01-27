<?php

namespace App\Http\Controllers\WEB;

use Carbon\Carbon;
use App\Models\Anggota;
use App\Models\Petugas;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebPengembalianController extends Controller
{


    public function update(Request $request, $id)
    {
        $input = $request->only('tanggal_pengembalian', 'anggota_id', 'petugas_id', 'denda', 'peminjaman_id');

        Anggota::findOrFail($input['anggota_id']);


        Petugas::findOrFail($input['petugas_id']);




        $peminjaman = Peminjaman::findOrFail($input['peminjaman_id']);
        if (isset($input['tanggal_pengembalian'])) {
            $formatted = Carbon::parse($input['tanggal_pengembalian'])->format('Y-m-d');

            $input['tanggal_pengembalian'] = $formatted;
            $peminjaman->update([
                'tanggal_kembali' => $formatted
            ]);
        }



        $peminjaman->update($input);
        $pengembalian = Pengembalian::create($input);
        return redirect()->route('pengembalian.index')->with('success', 'Peminjaman berhasil diupdate');
    }

    public function create()
    {
        $title = 'Tambah Peminjaman';
        $anggotas = Anggota::all();
        $petugas = Petugas::all();

        return view('pengembalian.create', compact('title', 'anggotas', 'petugas'));
    }
    public function store(Request $request)
    {
        $input = $request->only('tanggal_pengembalian', 'anggota_id', 'petugas_id', 'denda', 'peminjaman_id');
        $request->validate([
            'tanggal_pengembalian' => 'required|date',
            'denda' => 'required',
            'peminjaman_id' => 'required',
            'anggota_id' => 'required',
            'petugas_id' => 'required',
        ]);

        $formatted = Carbon::parse($input['tanggal_pengembalian'])->format('Y-m-d');

        $input['tanggal_pengembalian'] = $formatted;


        Anggota::findOrFail($input['anggota_id']);


        Petugas::findOrFail($input['petugas_id']);


        $peminjaman =  Peminjaman::findOrFail($input['peminjaman_id']);
        $peminjaman->update([
            'tanggal_kembali' => $formatted
        ]);
        return redirect()->route('pengembalian.index')->with('success', 'Peminjaman selesai dibuat');
    }


    public function index()
    {
        $pengembalians = Pengembalian::latest()->paginate(10);
        $title = 'Pengembalian';
        return view('pengembalian.index', compact('pengembalians', 'title'))->with('i', (request()->query('page', 1) - 1) * 10);
    }

    public function edit($id)
    {
        $title = 'Peminjaman Buku';
        $pengembalian = Pengembalian::findOrFail($id);
        $peminjamans = Peminjaman::all();
        $anggotas = Anggota::all();
        $petugas = Petugas::all();
        return view('pengembalian.edit', compact('title', 'pengembalian', 'peminjamans', 'anggotas', 'petugas'));
    }

    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();
        return redirect()->route('pengembalian.index')->with('success', 'Berhasil menghapus Pengembalian');
    }
}
