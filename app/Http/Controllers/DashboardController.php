<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() 
    {
        
        $kelas  = Kelas::count();
        $gurus  = Guru::count();
        $siswas = Siswa::count();
        $nilais = Nilai::count();

        return view('dashboard', compact('kelas', 'gurus', 'siswas','nilais'));
    }
}
