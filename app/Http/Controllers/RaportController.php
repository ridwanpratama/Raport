<?php

namespace App\Http\Controllers;

use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaportController extends Controller
{
      public function index()
      {
          $nilai = DB::table('nilai_mapel')->distinct()->pluck('siswa_id');
          $data = Nilai::whereIn("siswa_id",$nilai)->groupBy('siswa_id')->get();

          return view('raport.index', compact('data'));
      }
}
