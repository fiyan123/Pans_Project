<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            //validasi
            $validated = $request->validate([
                'nis'           => 'required|unique:siswas|min:5|max:10',
                'nama'          => 'required',
                'jenis_kelamin' => 'required',
                'id_kelas'      => 'required',
            ]);

            $siswa = new Siswa();

            // $nis = DB::table('nis')->select(DB::raw('MAX(RIGHT(nis,3)) as kode'));
            // if ($nis->count() > 0) {
            //     foreach ($nis->get() as $nis) {
            //         $x = ((int) $nis->kode) + 1;
            //         $kode = sprintf('%03s',$x);
            //     }
            // }
            // else {
            //     $kode = '001';
            // }

            // $siswa->nis           = 'IAN-' . date('dmy') . $kode;
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

            $siswa->delete();

            return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus!');
        }
}
