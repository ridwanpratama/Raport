<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
  public function validation(Request $request)
  {
      $validation = $request->validate([
          'nis' => 'required',
          'nama_siswa' => 'required',
          'rombel_id' => 'required',
          'rayon_id' => 'required',
          'jurusan_id' => 'required',
      ]);
  }

  public function index(Request $request)
  {
      $siswa = Siswa::where('tahun_ajaran_id', '=', $request->session()->get('tahun_ajaran'))->get();
      return view('admin.siswa.index',compact('siswa'));
  }

  public function filterJurusan(Request $request, $id)
  {
      $siswa = Siswa::where('jurusan_id', '=', $id)->get();
      return view('admin.siswa.index',compact('siswa'));
  }

  public function create()
  {
      return view('admin.siswa.create');
  }

  public function store(Request $request)
  {
      $this->validation($request);

      $tahun_ajaran = $request->session()->get('tahun_ajaran');

      Siswa::create([
          'nis' => $request->nis,
          'nama_siswa' => $request->nama_siswa,
          'rombel_id' => $request->rombel_id,
          'rayon_id' => $request->rayon_id,
          'jurusan_id' => $request->jurusan_id,
          'tahun_ajaran_id' => $tahun_ajaran
      ]);

      return redirect('siswa')->with('toast_success', 'Data berhasil disimpan!');
  }

  public function edit($id)
  {
      $siswa = Siswa::find($id);
      return view('admin.siswa.edit',compact('siswa'));
  }

  public function update(Request $request, $id)
  {
      $siswa = Siswa::find($id);
      $siswa->update([
          'nis' => $request->nis,
          'nama_siswa' => $request->nama_siswa,
          'rayon_id' => $request->rayon_id,
          'jurusan_id' => $request->jurusan_id,
          'rombel_id' => $request->rombel_id
      ]);

      return redirect()->route('siswa.index')->with('toast_success', 'Data berhasil diupdate!');
  }

  public function destroy($id)
  {
      $siswa = Siswa::find($id);
      $siswa->delete();
      return redirect('siswa')->with('toast_danger', 'Data berhasil dihapus!');
  }
}