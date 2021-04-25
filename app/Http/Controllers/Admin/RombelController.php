<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Rombel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RombelController extends Controller
{
  public function validation(Request $request)
  {
      $validation = $request->validate([
          'nama_rombel' => 'required',
          'jurusan_id' => 'required'
      ]);
  }

  public function index()
  {
      $rombel = Rombel::all();
      return view('admin.rombel.index',compact('rombel'));
  }

  public function create()
  {
      return view('admin.rombel.create');
  }

  public function store(Request $request)
  {
      $this->validation($request);

      Rombel::create([
          'nama_rombel' => $request->nama_rombel,
          'jurusan_id' => $request->jurusan_id,
      ]);

      return redirect('rombel')->with('toast_success', 'Data berhasil disimpan!');
  }

  public function edit($id)
  {
      $rombel = Rombel::find($id);
      return view('admin.rombel.edit',compact('rombel'));
  }

  public function update(Request $request, $id)
  {
      $rombel = Rombel::find($id);
      $rombel->update([
          'nama_rombel' => $request->nama_rombel,
          'jurusan_id' => $request->jurusan_id
      ]);

      return redirect()->route('rombel.index')->with('toast_success', 'Data berhasil diupdate!');
  }

  public function destroy($id)
  {
      $rombel = Rombel::find($id);
      $rombel->delete();
      return redirect('rombel')->with('toast_danger', 'Data berhasil dihapus!');
  }
}
