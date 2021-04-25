<?php

namespace App\Exports;

use App\Models\Guru\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NilaiExport implements FromView
{
    public function view(): View
    {
        return view('guru.nilai.export', [
            'datas' => Nilai::all()
        ]);
    }
}
