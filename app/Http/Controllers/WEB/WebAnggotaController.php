<?php

namespace App\Http\Controllers\WEB;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebAnggotaController extends Controller
{

    public function create()
    {
        return view('anggota.create');
    }

    public function index()
    {
        $anggotas = Anggota::oldest()->paginate(10);
        $title = 'Anggota';
        return view('anggota.index', compact('anggotas', 'title'));
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
