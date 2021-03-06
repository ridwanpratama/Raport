<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru\Absen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Jurusan;
use App\Models\Admin\Rombel;
use App\Models\Admin\JenisNilai;
use App\Models\Admin\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Absen::distinct()->pluck('siswa_id');
        $absen = Absen::whereIn('siswa_id', $data)->groupBy('siswa_id')->get();

        return view('guru.absen.index', compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.absen.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absen = Absen::find($id);
        return view('guru.absen.show', compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $absen = Absen::find($id);
        $absen->update([
            'sakit' => $request->sakit,
            'izin' => $request->izin,
            'alpha' => $request->alpha,
            'semester' => $request->semester,
            'jenis_nilai_id' => $request->jenis_nilai_id
        ]);

        return back()->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = Absen::find($id);
        $absen->delete();
        return back()->with('toast_warning', 'Data berhasil dihapus!');
    }

    public function jurusan()
    {
        $jurusan = Jurusan::all();

        return view('guru.absen.show.jurusan', compact('jurusan'));
    }

    public function rombel(Request $request, $id)
    {
        $rombel = Rombel::where('jurusan_id', $id)->get();
        $request->session()->put('jurusan_id', $request->id);

        return view('guru.absen.show.rombel', compact('rombel'));
    }

    public function input_absen(Request $request, $id)
    {
      $siswa = Siswa::where('rombel_id', $id)->get();
      $jenis_nilai = JenisNilai::whereNotIn('id', array(13,14,15,16,17,18,19,20,21,22,23,24,24))->get();

      return view('guru.absen.input', compact('siswa','jenis_nilai'));
    }

    public function submit(Request $request)
    {
      $siswa_id = $request->siswa_id;
      $sakit = $request->sakit;
      $jenis_nilai_id = $request->jenis_nilai_id;
      $izin = $request->izin;
      $alpha = $request->alpha;
      $semester = $request->semester;
      $tanggal = $request->tanggal;

      for ($i = 0; $i < count($siswa_id); $i++) {
          $datasave = [
              'siswa_id' => $siswa_id[$i],
              'sakit' => $sakit[$i],
              'izin' => $izin[$i],
              'alpha' => $alpha[$i],
              'semester' => $semester[$i],
              "created_at" =>  \Carbon\Carbon::now(),
              "updated_at" => \Carbon\Carbon::now(),
              'jenis_nilai_id' => $jenis_nilai_id[$i],
              'tanggal' => $tanggal[$i],
          ];
            //   return dd($datasave);
          DB::table('absen')->insert($datasave);
      }
      return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
    }

    public function showAbsen($siswa_id)
    {
        $absen = Absen::where('siswa_id', $siswa_id)->get();
        $siswa = Siswa::where('id', $siswa_id)->firstorFail();

        return view('guru.absen.view', compact('absen','siswa'));
    }
}
