<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        // validasi data
        $validated = $request->validate([
            'nip'            => 'required|unique:gurus|min:5|max:10',
            'nama'           => 'required',
            'jenis_kelamin'  => 'required',
            'mata_pelajaran' => 'required',

        // Validasi Akun
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $users = new User();

            $users->name     = $request->name;
            $users->email    = $request->email;
            $users->password = Hash::make($validated['password']);
            $users->save();


        $guru = new Guru();

            $guru->nip              = $request->nip;
            $guru->nama             = $request->nama;
            $guru->jenis_kelamin    = $request->jenis_kelamin;
            $guru->mata_pelajaran   = $request->mata_pelajaran;
            $guru->save();

        // Akun Create
        // User::create([

        //     'name'     => $validated['name'],
        //     'email'    => $validated['email'],
        //     'password' => Hash::make($validated['password']),
        // ]);

        // // Data Create
        // Guru::create([

        //     'nip'           => $validated['nip'],
        //     'nama'          => $validated['nama'],
        //     'jenis_kelamin' => $validated['jenis_kelamin'],
        //     'mata_pelajaran'=> $validated['mata_pelajaran'],
        // ]);

        return redirect()->route('guru.index')->with('success', 'Data berhasil ditambah!');
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
            'nip'            => 'required|min:5|max:10',
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

        $users = User::findOrFail($id);
        
        $guru->delete();
        
        $users->delete();
        
        return redirect()->route('guru.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
