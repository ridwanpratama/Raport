<?php

namespace App\Exports;

use App\Models\Guru\Absen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AbsenExport implements FromView
{
    public function view(): View
    {
        return view('guru.absen.export', [
            'absen' => Absen::all()
        ]);
    }
}
