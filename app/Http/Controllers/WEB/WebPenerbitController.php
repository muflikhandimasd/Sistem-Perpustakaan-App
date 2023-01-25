<?php

namespace App\Http\Controllers\WEB;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebPenerbitController extends Controller
{
    public function create()
    {
        $title = "Tambah penerbit";
        return view('penerbit.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit penerbit';
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit', 'title'));
    }

    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->only('nama_penerbit', 'telp', 'alamat'));
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil diupdate');
    }

    public function index()
    {
        $penerbits = Penerbit::latest()->paginate(10);
        $title = 'penerbit';

        return view('penerbit.index', compact('penerbits', 'title'))->with('i', (request()->query('page', 1) - 1) * 10);;
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil dihapus');
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama_penerbit' => 'required',

            'telp' => 'required',

            'alamat' => 'required'

        ]);
        Penerbit::create($request->only('nama_penerbit', 'telp', 'alamat'));
        return redirect()->route('penerbit.index')->with('success', 'penerbit berhasil dibuat');
    }
}
