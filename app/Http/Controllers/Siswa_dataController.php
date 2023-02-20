<?php

namespace App\Http\Controllers;

use data;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Auth;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;


class Siswa_dataController extends Controller
{
    public function index()
    {

        $nilais = Nilai::where('id_siswa', '=' ,Auth::user()->id)->latest()->get();
        // $email  = Auth::user()->email;
        // $nilais = Nilai::where('id_siswa', '=' ,Auth::user()->id)->get();
        $kelas  = Kelas::all();
        // dd($nilais);
   
        return view('siswa_nilai.index', compact('nilais','kelas'));
    }

    public function show($id)
    {
        $nilais = Nilai::findOrFail($id);

        return view('siswa_nilai.show', compact('nilais'));
    }

    public function exportNilaiExcel()
    {
        return Excel::download(new DataExport, 'Nilai Siswa.xlsx');
    }
}
