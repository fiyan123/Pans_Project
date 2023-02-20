<?php

namespace App\Exports;


use App\Models\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Auth;

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
        $nilais = Nilai::where('id_siswa', '=' ,Auth::user()->id)->latest()->get();

        // return view('export.invoices_siswa', [
        //     'nilais' => $this->nilais
        // ]);

        return view('export.invoices_siswa', compact('nilais'));
    }

}
