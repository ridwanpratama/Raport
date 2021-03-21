<?php

namespace App\Exports;

use App\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NilaiExport implements FromView
{
    public function view(): View
    {
        return view('nilai.export', [
            'datas' => Nilai::all()
        ]);
    }
}