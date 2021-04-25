<?php

namespace App\Http\Controllers\Guru;

use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RaportController extends Controller
{
  public function index()
  {
      $nilai = DB::table('nilai_mapel')->distinct()->pluck('siswa_id');
      $data = Nilai::whereIn("siswa_id",$nilai)->groupBy('siswa_id')->get();

      return view('guru.raport.index', compact('data'));
  }
}
