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

        if(auth()->user()->is_admin == 1 || auth()->user()->is_guru == 1){
            $nilais = Nilai::all();
        } 
        else {
            // Mengambil data nilai yang sesuai dengan user yang login
            $siswa = Siswa::where('user_siswa',auth()->user()->id)->first();
            $nilais = Nilai::where('id_siswa',$siswa->id)->latest()->get();
        }
   
        return view('siswa_nilai.index', compact('nilais'));
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

    public function printPdf()
    {
        // Mengambil data nilai yang sesuai dengan user yang login
        $siswa = Siswa::where('user_siswa',auth()->user()->id)->first();
        $nilais = Nilai::where('id_siswa',$siswa->id)->latest()->get();

        return view('print.siswa_nilai', compact('nilais'));
    }
}
