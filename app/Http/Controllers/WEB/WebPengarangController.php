<?php

namespace App\Http\Controllers\WEB;

use App\Models\Pengarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebPengarangController extends Controller
{
    public function create()
    {
        $title = "Tambah pengarang";
        return view('pengarang.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit pengarang';
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.edit', compact('pengarang', 'title'));
    }

    public function update(Request $request, $id)
    {
        $pengarang = pengarang::findOrFail($id);
        $pengarang->update($request->only('nama_pengarang', 'telp', 'alamat'));
        return redirect()->route('pengarang.index')->with('success', 'pengarang berhasil diupdate');
    }

    public function index()
    {
        $pengarangs = Pengarang::latest()->paginate(10);
        $title = 'pengarang';

        return view('pengarang.index', compact('pengarangs', 'title'))->with('i', (request()->query('page', 1) - 1) * 10);;
    }

    public function destroy($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();
        return redirect()->route('pengarang.index')->with('success', 'pengarang berhasil dihapus');
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama_pengarang' => 'required',

            'telp' => 'required',

            'alamat' => 'required'

        ]);
        Pengarang::create($request->only('nama_pengarang', 'telp', 'alamat'));
        return redirect()->route('pengarang.index')->with('success', 'pengarang berhasil dibuat');
    }
}
