<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru\Upd;
use App\Models\Admin\Rombel;
use Illuminate\Http\Request;
use App\Models\Admin\Jurusan;
use App\Models\Admin\Siswa;
use App\Models\Admin\JenisNilai;
use App\Models\Admin\Detail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UpdController extends Controller
{
    public function validation(Request $request)
    {
        $validation = $request->validate([
            'siswa_id' => 'required',
            'detail_upd_id' => 'required',
            'jenis_nilai_id' => 'required',
            'nilai_upd' => 'required',
            'semester' => 'required',
            'jumlah_tidak_hadir' => 'required',
        ],
            [
                'siswa_id.required' => 'Field ini harus diisi!',
                'detail_upd_id.required' => 'Field ini harus diisi!',
                'jenis_nilai_id' => 'Field ini harus di isi',
                'nilai_upd.required' => 'Field ini harus diisi!',
            ]);
    }

    public function jurusan()
    {
        $jurusan = Jurusan::all();

        return view('guru.upd.show.datajurusan', compact('jurusan'));
    }

    public function rombel(Request $request, $id)
    {
        $rombel = Rombel::where('jurusan_id', $id)->get();
        $request->session()->put('jurusan_id', $request->id);

        return view('guru.upd.show.datarombel', compact('rombel'));
    }

    public function index()
    {
        $upd = Upd::all();
        return view('guru.upd.index', compact('upd'));
    }

    public function create()
    {
      //
    }

    public function input_nilai(Request $request, $id)
    {
      $siswa = Siswa::where('rombel_id', $id)->get();
      $upd = Detail::all();
      $jenis_nilai = JenisNilai::whereNotIn('id', array(13,14,15,16,17,18,19,20,21,22,23,24,24))->get();

      return view('guru.upd.input', compact('siswa','upd','jenis_nilai'));
    }

    public function store(Request $request)
    {
      $this->validation($request);
      Upd::create([
          'siswa_id' => $request->siswa_id,
          'detail_upd_id' => $request->detail_upd_id,
          'jenis_nilai_id' => $request->jenis_nilai_id,
          'nilai_upd' => $request->nilai_upd,
          'jumlah_tidak_hadir' => $request->jumlah_tidak_hadir,
          'semester' => $request->semester,
      ]);

      return redirect('upd')->with('toast_success', 'Data berhasil disimpan!');
    }

    public function submit(Request $request)
    {
      $siswa_id = $request->siswa_id;
      $detail_upd_id = $request->detail_upd_id;
      $jenis_nilai_id = $request->jenis_nilai_id;
      $nilai_upd = $request->nilai_upd;
      $jumlah_kehadiran = $request->jumlah_kehadiran;
      $jumlah_tidak_hadir = $request->jumlah_tidak_hadir;
      $semester = $request->semester;

      for ($i = 0; $i < count($siswa_id); $i++) {
          $datasave = [
              'siswa_id' => $siswa_id[$i],
              'detail_upd_id' => $detail_upd_id[$i],
              'jenis_nilai_id' => $jenis_nilai_id[$i],
              'nilai_upd' => $nilai_upd[$i],
              'jumlah_kehadiran' => $jumlah_kehadiran[$i],
              'jumlah_tidak_hadir' => $jumlah_tidak_hadir[$i],
              'semester' => $semester[$i],
              "created_at" =>  \Carbon\Carbon::now(),
              "updated_at" => \Carbon\Carbon::now(),
          ];
          // return dd($datasave);
          DB::table('upd')->insert($datasave);
      }
      return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $upd = Upd::find($id);
        $upd->update([
            'siswa_id' => $request->siswa_id,
            'detail_upd_id' => $request->detail_upd_id,
            'jenis_nilai_id' => $request->jenis_nilai_id,
            'nilai_upd' => $request->nilai_upd,
            'semester' => $request->semester,
            'jumlah_tidak_hadir' => $request->jumlah_tidak_hadir,
        ]);

        return redirect()->route('upd.index')->with('message', 'Mapel berhasil di perbarui');
    }

    public function destroy($id)
    {
        $upd = Upd::find($id);
        $upd->delete();
        return redirect('upd');
    }

    public function show($id)
    {
      $upd = Upd::find($id);
      return view('guru.upd.show', compact('upd'));
    }

}
