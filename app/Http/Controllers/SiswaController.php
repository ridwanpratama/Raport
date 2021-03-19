<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function validation(Request $request)
    {
        $validation = $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama_siswa' => 'required',
            'rombel' => 'required',
            'tingkat' => 'required',
            'rayon_id' => 'required',
            'jurusan_id' => 'required',
        ]);
    }

    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index',compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $this->validation($request);

        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'tingkat' => $request->tingkat,
            'rombel' => $request->rombel,
            'rayon_id' => $request->rayon_id,
            'jurusan_id' => $request->jurusan_id
        ]);

        return redirect('siswa')->with('toast_success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit',compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update([
            'nis' => $request->get('nis'),
            'nama_siswa' => $request->get('nama_siswa'),
            'tingkat' => $request->get('tingkat'),
            'rombel' => $request->get('rombel'),
            'rayon_id' => $request->get('rayon_id'),
            'jurusan_id' => $request->get('jurusan_id')
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
