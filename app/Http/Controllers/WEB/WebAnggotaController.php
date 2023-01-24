<?php

namespace App\Http\Controllers\WEB;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebAnggotaController extends Controller
{

    public function create()
    {
        $title = "Tambah Anggota";
        return view('anggota.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit Anggota';
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota', 'title'));
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->only('nama_anggota', 'telp', 'jenis_kelamin', 'alamat'));
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diupdate');
    }

    public function index()
    {
        $anggotas = Anggota::latest()->paginate(10);
        $title = 'Anggota';

        return view('anggota.index', compact('anggotas', 'title'))->with('i', (request()->query('page', 1) - 1) * 10);;
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus');
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'telp' => 'required',

            'alamat' => 'required'

        ]);
        Anggota::create($request->all());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dibuat');
    }
}
