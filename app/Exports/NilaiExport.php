<?php

namespace App\Exports;


use App\Models\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class NilaiExport implements FromView,ShouldAutoSize
{

    use Exportable; 

    private $nilais;

    public function __construct()
    {
        $this->nilais = Nilai::all();
    }

    public function view() : View
    {
        // $nilai = Nilai::all();
        return view('export.invoices', [
            'nilais' => $this->nilais
        ]);
    }

}
