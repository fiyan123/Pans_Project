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
            'nilai_kehadiran' => 'required',
            'nilai_harian'    => 'required',
            'pas'             => 'required',
            'pat'             => 'required',
        ]);

        $nilai = new Nilai();

        $nilai->id_guru         = $request->id_guru;
        $nilai->id_siswa        = $request->id_siswa;
        $nilai->id_kelas        = $request->id_kelas;
        $nilai->nilai_kehadiran = $request->nilai_kehadiran;
        $nilai->nilai_harian    = $request->nilai_harian;
        $nilai->pas             = $request->pas;
        $nilai->pat             = $request->pat;
        $nilai->raport          = ($request->nilai_kehadiran + $request->nilai_harian + $request->pas + $request->pat) / 4;
        
        if ($nilai->raport >= 90 && $nilai->raport <= 100) {
            $grade = "A";
        } elseif ($nilai->raport >= 80 && $nilai->raport <= 89) {
            $grade = "B";
        } elseif ($nilai->raport >= 70 && $nilai->raport <= 79) {
            $grade = "C";
        } elseif ($nilai->raport >= 60 && $nilai->raport <= 69) {
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
            'nilai_kehadiran' => 'required',
            'nilai_harian'    => 'required',
            'pas'             => 'required',
            'pat'             => 'required',

        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->id_kelas        = $request->id_kelas;
        $nilai->id_siswa        = $request->id_siswa;
        $nilai->id_guru         = $request->id_guru;
        $nilai->nilai_kehadiran = $request->nilai_kehadiran;
        $nilai->nilai_harian    = $request->nilai_harian;
        $nilai->pas             = $request->pas;
        $nilai->pat             = $request->pat;
        $raport                 = ($request->nilai_kehadiran + $request->nilai_harian + $request->pas + $request->pat) / 4;
        $nilai->raport          = $raport;

        if ($nilai->raport >= 90 && $nilai->raport <= 100) {
            $grade = "A";
        } elseif ($nilai->raport >= 80 && $nilai->raport <= 89) {
            $grade = "B";
        } elseif ($nilai->raport >= 70 && $nilai->raport <= 79) {
            $grade = "C";
        } elseif ($nilai->raport >= 60 && $nilai->raport <= 69) {
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
