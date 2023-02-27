<?php

namespace App\Exports;


use Auth;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataExport implements FromView,ShouldAutoSize
{

    use Exportable; 

    private $nilais;

    public function __construct()
    {
        $this->nilais = Nilai::all();
        
    }

    public function view() : View
    {
        // $nilais = Nilai::where('id_siswa', '=' ,Auth::user()->id)->latest()->get();
        $siswa = Siswa::where('user_siswa',auth()->user()->id)->first();
        $nilais = Nilai::where('id_siswa',$siswa->id)->latest()->get();

        return view('export.invoices_siswa', compact('nilais'));
    }

}
