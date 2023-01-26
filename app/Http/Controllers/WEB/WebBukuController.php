<?php

namespace App\Http\Controllers\WEB;

use App\Models\Rak;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WebBukuController extends Controller
{

    public function update(Request $request, $id)
    {
        $input = $request->only(['judul_buku', 'tahun_terbit', 'jumlah', 'isbn', 'pengarang_id', 'penerbit_id', 'rak_id']);
        Pengarang::findOrFail($input['pengarang_id']);
s
        Penerbit::findOrFail($input['penerbit_id']);


        Rak::findOrFail($input['rak_id']);
        $buku = Buku::findOrFail($id);
        $buku->update($input);

        return redirect()->route('')

    }

    public function create()
    {
        $title = 'Tambah Buku';
        return view('anggota.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit Buku';
        return view('buku.edit', compact('title'));
    }

    public function store(Request $request)
    {
        $input = $request->only(['judul_buku', 'tahun_terbit', 'jumlah', 'isbn', 'pengarang_id', 'penerbit_id', 'rak_id']);
        $request->validate([
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'jumlah' => 'required',
            'isbn' => 'required',
            'pengarang_id' => 'required',
            'penerbit_id' => 'required',
            'rak_id' => 'required'
        ]);


        Pengarang::findOrFail($input['pengarang_id']);

        Penerbit::findOrFail($input['penerbit_id']);


        Rak::findOrFail($input['rak_id']);



        Buku::create($input);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dibuat');
    }

    public function index()
    {
        $bukus = Buku::latest()->paginate(10);
        $title = 'Buku';
        return view('buku.index', compact('bukus', 'title'));
    }
}
