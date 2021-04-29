<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\TahunAjaran;
use App\Http\Controllers\Controller;

class TahunAjaranController extends Controller
{
  public function validation(Request $request)
  {
      $validation = $request->validate([
          'tahun_ajaran' => 'required|unique:tahun_ajaran'
      ]);
  }

  public function index()
  {
      $tahun_ajaran = TahunAjaran::all();
      return view('admin.tahun_ajaran.index',compact('tahun_ajaran'));
  }

  public function create()
  {
      return view('admin.tahun_ajaran.create');
  }

  public function store(Request $request)
  {
      $this->validation($request);

      TahunAjaran::create([
          'tahun_ajaran' => $request->tahun_ajaran
      ]);

      return redirect('tahun_ajaran')->with('toast_success', 'Data berhasil disimpan!');
  }

  public function edit($id)
  {
      $tahun_ajaran = TahunAjaran::find($id);
      return view('admin.tahun_ajaran.edit',compact('tahun_ajaran'));
  }

  public function update(Request $request, $id)
  {
      $tahun_ajaran = TahunAjaran::find($id);
      $tahun_ajaran->update([
          'tahun_ajaran' => $request->tahun_ajaran
      ]);

      return redirect()->route('tahun_ajaran.index')->with('toast_success', 'Data berhasil diupdate!');
  }

  public function destroy($id)
  {
      $tahun_ajaran = TahunAjaran::find($id);
      $tahun_ajaran->delete();
      return redirect('tahun_ajaran')->with('toast_warning', 'Data berhasil dihapus!');
  }
}
