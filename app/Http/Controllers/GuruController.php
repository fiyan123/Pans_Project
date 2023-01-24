<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->get();

        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        $guru = Guru::all();

        return view('guru.create', compact('guru'));
    }

    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nip'            => 'required|unique:gurus',
            'nama'           => 'required',
            'jenis_kelamin'  => 'required',
            'mata_pelajaran' => 'required',
        ]);

        $guru = new Guru();

        $guru->nip             = $request->nip;
        $guru->nama            = $request->nama;
        $guru->jenis_kelamin   = $request->jenis_kelamin;
        $guru->mata_pelajaran  = $request->mata_pelajaran;
        $guru->save();

        return redirect()->route('guru.index')
            ->with('success', 'Data berhasil ditambah!');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);

        return view('admin.guru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $validated = $request->validate([
            'nip'            => 'required',
            'nama'           => 'required',
            'jenis_kelamin'  => 'required',
            'mata_pelajaran' => 'required',
        ]);

        $guru = Guru::findOrFail($id);

        $guru->nip              = $request->nip;
        $guru->nama             = $request->nama;
        $guru->jenis_kelamin    = $request->jenis_kelamin;
        $guru->mata_pelajaran   = $request->mata_pelajaran;
        $guru->save();

        return redirect()->route('guru.index')
            ->with('success', 'Data berhasil diedit!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        
        $guru->delete();
        
        return redirect()->route('guru.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
