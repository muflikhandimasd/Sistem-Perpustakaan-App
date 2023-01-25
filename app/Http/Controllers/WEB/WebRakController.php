<?php

namespace App\Http\Controllers\WEB;

use App\Models\Rak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebRakController extends Controller
{
    public function create()
    {
        $title = "Tambah rak";
        return view('rak.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit rak';
        $rak = Rak::findOrFail($id);
        return view('rak.edit', compact('rak', 'title'));
    }

    public function update(Request $request, $id)
    {
        $rak = Rak::findOrFail($id);
        $rak->update($request->only('kode_rak', 'lokasi'));
        return redirect()->route('rak.index')->with('success', 'rak berhasil diupdate');
    }

    public function index()
    {
        $raks = Rak::latest()->paginate(10);
        $title = 'rak';

        return view('rak.index', compact('raks', 'title'))->with('i', (request()->query('page', 1) - 1) * 10);;
    }

    public function destroy($id)
    {
        $rak = Rak::findOrFail($id);
        $rak->delete();
        return redirect()->route('rak.index')->with('success', 'rak berhasil dihapus');
    }
    public function store(Request $request)
    {

        $request->validate([
            'kode_rak' => 'required',

            'lokasi' => 'required',



        ]);
        Rak::create($request->only('kode_rak', 'lokasi'));
        return redirect()->route('rak.index')->with('success', 'rak berhasil dibuat');
    }
}
