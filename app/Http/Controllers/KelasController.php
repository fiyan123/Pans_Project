<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();

        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();

        return view('kelas.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'kelas'   => 'required|unique:kelas',
            'jurusan' => 'required',
        ]);

        $kelas = new Kelas();

        $kelas->kelas   = $request->kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->save();

        return redirect()->route('kelas.index')
            ->with('success', 'Data Kelas '. $kelas->kelas . ' Dibuat!');
    }

    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('admin.kelas.show', compact('kelas'));
    }


    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('admin.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $validated = $request->validate([
            'kelas'   => 'required',
            'jurusan' => 'required',

        ]);

        $kelas = Kelas::findOrFail($id);

        $kelas->kelas   = $request->kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->save();

        return redirect()->route('kelas.index')
            ->with('success', 'Data Berhasil Diedit!');
    }

    public function destroy($id)
    {
        if(!Kelas::destroy($id)) {
            return redirect()->back();
        }

        return redirect()->route('kelas.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }
}

