<?php

namespace App\Exports;

use App\Models\Guru\Upd;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UpdExport implements FromView
{
    public function view(): View
    {
        return view('guru.upd.export', [
            'upd' => Upd::all()
        ]);
    }
}
