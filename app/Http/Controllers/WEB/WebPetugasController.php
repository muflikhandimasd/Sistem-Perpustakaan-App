<?php

namespace App\Http\Controllers\WEB;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebPetugasController extends Controller
{
    public function create()
    {
        $title = "Tambah petugas";
        return view('petugas.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit petugas';
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->only('nama_petugas', 'telp', 'jenis_kelamin', 'alamat', 'username', 'password'));
        return redirect()->route('petugas.index')->with('success', 'petugas berhasil diupdate');
    }

    public function index()
    {
        $petugas = Petugas::latest()->paginate(10);
        $title = 'Petugas';

        return view('petugas.index', compact('petugas', 'title'))->with('i', (request()->query('page', 1) - 1) * 10);;
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'petugas berhasil dihapus');
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama_petugas' => 'required',

            'telp' => 'required',
            'username' => 'required',
            'password' => 'required',

            'alamat' => 'required'

        ]);
        Petugas::create($request->all());
        return redirect()->route('petugas.index')->with('success', 'petugas berhasil dibuat');
    }
}
