<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index()
    {

        $nilai = Nilai::orderBy('id','desc')->get();
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
            'to1'             => 'required',
            'to2'             => 'required',
            'to3'             => 'required',
            'to4'             => 'required',
        ]);

        $nilai = new Nilai();

        $nilai->id_guru         = $request->id_guru;
        $nilai->id_siswa        = $request->id_siswa;
        $nilai->id_kelas        = $request->id_kelas;
        $nilai->to1             = $request->to1;
        $nilai->to2             = $request->to2;
        $nilai->to3             = $request->to3;
        $nilai->to4             = $request->to4;
        $nilai->nilai_akhir     = ($request->to1 + $request->to2 + $request->to3 + $request->to4) / 4;

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

        return redirect()->route('nilai.index')->with('success', 'Data berhasil ditambah!');

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
            'to1'             => 'required',
            'to2'             => 'required',
            'to3'             => 'required',
            'to4'             => 'required',

        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->id_kelas        = $request->id_kelas;
        $nilai->id_siswa        = $request->id_siswa;
        $nilai->id_guru         = $request->id_guru;
        $nilai->to1             = $request->to1;
        $nilai->to2             = $request->to2;
        $nilai->to3             = $request->to3;
        $nilai->to4             = $request->to4;
        $nilai_akhir            = ($request->to1 + $request->to2 + $request->to3 + $request->to4) / 4;
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
}
