<?php

namespace App\Http\Controllers\Guru;

use App\Absen;
use App\Jurusan;
use App\Nilai;
use App\Rombel;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NilaiController extends Controller
{
  public function index()
  {
      $nilai = DB::table('nilai_mapel')->distinct()->pluck('siswa_id');
      $data = Nilai::whereIn('siswa_id', $nilai)->groupBy('siswa_id')->get();

      return view('guru.nilai.index', compact('data'));
  }

  public function create()
  {
      $absen = Absen::all();
      return view('guru.nilai.create', compact('absen'));
  }

  public function store(Request $request)
  {
      $siswa_id = $request->siswa_id;
      $mapel_id = $request->mapel_id;
      $jenis_nilai_id = $request->jenis_nilai_id;
      $nilai_pengetahuan = $request->nilai_pengetahuan;
      $nilai_keterampilan = $request->nilai_keterampilan;
      $semester = $request->semester;

      for ($i = 0; $i < count($siswa_id); $i++) {
          $datasave = [
              'siswa_id' => $siswa_id[$i],
              'mapel_id' => $mapel_id[$i],
              'jenis_nilai_id' => $jenis_nilai_id[$i],
              'nilai_pengetahuan' => $nilai_pengetahuan[$i],
              'nilai_keterampilan' => $nilai_keterampilan[$i],
              'semester' => $semester[$i],
          ];
          // return dd($datasave);
          DB::table('nilai_mapel')->insert($datasave);
      }
      return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
  }

  public function destroy($id)
  {
      $nilai = Nilai::find($id);
      $nilai->delete();
      return redirect('nilai')->with('toast_danger', 'Data berhasil dihapus!');
  }

  public function rombel($id)
  {
      $rombel = Rombel::where('jurusan_id', $id)->get();

      return view('guru.nilai.show.listrombel', compact('rombel'));
  }

  public function input($id)
  {
      $siswa = Siswa::where('rombel_id', $id)->get();

      return view('guru.nilai.input', compact('siswa'));
  }

  public function jurusan()
  {
      $jurusan = Jurusan::all();

      return view('guru.nilai.show.listjurusan', compact('jurusan'));
  }
}
