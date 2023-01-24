<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class Siswa_dataController extends Controller
{
    public function index()
    {

        $nilai = Nilai::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $guru  = Guru::all();

        return view('siswa_nilai.index', compact('nilai', 'siswa', 'kelas', 'guru'));
    }

}
