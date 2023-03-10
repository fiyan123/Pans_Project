<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class NilaiController extends Controller
{
    public function index()
    {

        $nilai = Nilai::where('user_guru', auth()->user()->id)->latest()->get();
        $kelas = Kelas::all();
        $guru  = Guru::all();
        $siswa = Siswa::all();

        return view('GuruUser.nilai.index', compact('nilai', 'kelas', 'guru', 'siswa'));
    }

    public function create()
    {
        $nilai = Nilai::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $guru  = Guru::all();

        return view('nilai.create', compact('kelas', 'siswa', 'guru', 'nilai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_guru'         => 'required',
            'id_siswa'        => 'required',
            'id_kelas'        => 'required',
            'nilai1'          => 'required|min:0|max:100',
            'nilai2'          => 'required|min:0|max:100',
            'nilai3'          => 'required|min:0|max:100',
            'nilai4'          => 'required|min:0|max:100',
        ]);

        // Validasi Data Sama
        $cek_nilai = Nilai::where('id_guru', $request->id_guru)->where('id_siswa', $request->id_siswa)->where('id_kelas', $request->id_kelas)->first();

        if (!empty($cek_nilai)) {
                toast('Data Sudah Ada!','error');
            return redirect()->route('nilai.index');
        } else {

            $nilai = new Nilai();

            $nilai->id_guru         = $request->id_guru;
            $nilai->id_siswa        = $request->id_siswa;
            $nilai->id_kelas        = $request->id_kelas;
            $nilai->nilai1          = $request->nilai1;
            $nilai->nilai2          = $request->nilai2;
            $nilai->nilai3          = $request->nilai3;
            $nilai->nilai4          = $request->nilai4;
            $nilai->nilai_akhir     = ($request->nilai1 + $request->nilai2 + $request->nilai3 + $request->nilai4) / 4;
    
            if ($nilai->nilai_akhir >= 90 && $nilai->nilai_akhir <= 100) {
                $grade = "A";
            } elseif ($nilai->nilai_akhir >= 80 && $nilai->nilai_akhir <= 89) {
                $grade = "B";
            } elseif ($nilai->nilai_akhir >= 70 && $nilai->nilai_akhir <= 79) {
                $grade = "C";
            } elseif ($nilai->nilai_akhir >= 60 && $nilai->nilai_akhir <= 69) {
                $grade = "D";
            } else {
                $grade = "E";
            }
    
            $nilai['user_guru'] = auth()->user()->id;
    
            $nilai->nilai_grade = $grade;
    
            $nilai->save();
    
            return redirect()->route('nilai.index')->with('success', 'Data berhasil ditambah!');
        }
    }

    public function show($id)
    {
        $nilai = Nilai::findOrFail($id);

        return view('GuruUser.nilai.show', compact('nilai'));

    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $guru  = Guru::all();

        return view('GuruUser.nilai.edit', compact('siswa', 'kelas', 'guru', 'nilai'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'id_guru'         => 'required',
            'id_siswa'        => 'required',
            'id_kelas'        => 'required',
            'nilai1'          => 'required|min:0|max:100',
            'nilai2'          => 'required|min:0|max:100',
            'nilai3'          => 'required|min:0|max:100',
            'nilai4'          => 'required|min:0|max:100',

        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->id_kelas        = $request->id_kelas;
        $nilai->id_siswa        = $request->id_siswa;
        $nilai->id_guru         = $request->id_guru;
        $nilai->nilai1          = $request->nilai1;
        $nilai->nilai2          = $request->nilai2;
        $nilai->nilai3          = $request->nilai3;
        $nilai->nilai4          = $request->nilai4;
        $nilai_akhir            = ($request->nilai1 + $request->nilai2 + $request->nilai3 + $request->nilai4) / 4;
        $nilai->nilai_akhir     = $nilai_akhir;

        if ($nilai->nilai_akhir >= 90 && $nilai->nilai_akhir <= 100) {
            $grade = "A";
        } elseif ($nilai->nilai_akhir >= 80 && $nilai->nilai_akhir <= 89) {
            $grade = "B";
        } elseif ($nilai->nilai_akhir >= 70 && $nilai->nilai_akhir <= 79) {
            $grade = "C";
        } elseif ($nilai->nilai_akhir >= 60 && $nilai->nilai_akhir <= 69) {
            $grade = "D";
        } else {
            $grade = "E";
        }
        $nilai->nilai_grade = $grade;

        $nilai->save();

        return redirect()->route('nilai.index')->with('success', 'Data berhasil diedit!');

    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);

        $nilai->delete();
        return redirect()->route('nilai.index')->with('success', 'Data berhasil dihapus!');

    }

    public function downloadExcel()
    {
        return Excel::download(new NilaiExport, 'DataNilai.xlsx');
    }

    // Method Data Dinamis
    public function getNamaSiswa($id)
    {
        $siswa = Siswa::where('id_kelas', $id)->get();
        return response()->json($siswa);
    }
}
