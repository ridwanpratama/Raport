<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru\Nilai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RaportController extends Controller
{
  public function index()
  {
      $nilai = Nilai::distinct()->pluck('siswa_id');
      $data = Nilai::whereIn("siswa_id",$nilai)->groupBy('siswa_id')->get();

      return view('guru.raport.index', compact('data'));
  }

  public function search(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $startDate = $from.' 00:00:00';
        $endDate = $to.' 23:59:59';
 
        $nilai = Nilai::whereBetween('created_at', [$startDate,$endDate])->latest()->get();

        return view('guru.raport.index', compact('nilai', 'startDate', 'endDate'));
    }
}
