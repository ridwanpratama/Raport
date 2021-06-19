<?php

namespace App\Exports;

use App\Models\Admin\Siswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaExport implements FromView
{
  public function view(): View
  {
    return view('admin.siswa.export', [
      'datas' => Siswa::all()
    ]);
  }
}
