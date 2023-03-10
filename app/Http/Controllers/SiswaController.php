<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
        public function index()
        {
            $siswa = Siswa::latest()->get();
            $kelas = Kelas::all();

            return view('admin.siswa.index', compact('siswa','kelas'));
        }

        public function create()
        {
            $kelas = Kelas::all();

            return view('siswa.create', compact('kelas'));
        }

        public function store(Request $request)
        {
            // Validasi Data
            $validated = $request->validate([
                'nis'           => 'required|unique:siswas|min:5|max:10',
                'nama'          => 'required',
                'jenis_kelamin' => 'required',
                'id_kelas'      => 'required',

            // Validasi Akun
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $users = new User();

            $users->name     = $request->name;
            $users->email    = $request->email;
            $users->password = Hash::make($validated['password']);
            $users->save();


            $siswa = new Siswa();

            $siswa['user_siswa']  = $users->id;
            $siswa->nis           = $request->nis;
            $siswa->nama          = $request->nama;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->id_kelas      = $request->id_kelas;
            $siswa->save();

            return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambah!');
        }

        public function show($id)
        {
            $siswa = Siswa::findOrFail($id);

            return view('admin.siswa.show', compact('siswa'));
        }

        public function edit($id)
        {
            $siswa = Siswa::findOrFail($id);
            $kelas = Kelas::all();

            return view('admin.siswa.edit', compact('siswa', 'kelas'));
        }

        public function update(Request $request, $id)
        {
            // Validasi
            $validated = $request->validate([
                'nis'           => 'required||min:5|max:10',
                'nama'          => 'required',
                'jenis_kelamin' => 'required',
                'id_kelas'      => 'required',
            ]);

            $siswa = Siswa::findOrFail($id);

            $siswa->nis             = $request->nis;
            $siswa->nama            = $request->nama;
            $siswa->jenis_kelamin   = $request->jenis_kelamin;
            $siswa->id_kelas        = $request->id_kelas;

            $siswa->save();

            return redirect()->route('siswa.index')
                ->with('success', 'Data berhasil diedit!');
        }

        public function destroy($id)
        {
            $siswa = Siswa::findOrFail($id);

            $users  = User::findOrFail($siswa->user_siswa);

            $siswa->delete();

            $users->delete();

            return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus!');
        }

        // Method Data Dinamis
        public function getNamaSiswa($id)
        {
            $siswa = Siswa::where('id_kelas', $id)->get();
            return response()->json($siswa);
        }

}
