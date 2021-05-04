<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Siswa;
use Illuminate\Http\Request;

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
        $data = Siswa::where('tahun_ajaran_id', $request->session()->get('tahun_ajaran'))->get();
        return view('admin.siswa.index', compact('data'));
    }

    public function filterJurusan($id)
    {
        $data = Siswa::where('jurusan_id', $id)->get();
        return view('admin.siswa.index', compact('data'));
    }

    public function filterRayon($id)
    {
        $data = Siswa::where('rayon_id', $id)->get();
        return view('admin.siswa.index', compact('data'));
    }

    public function filterRombel($id)
    {
        $data = Siswa::where('rombel_id', $id)->get();
        return view('admin.siswa.index', compact('data'));
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
            'tahun_ajaran_id' => $tahun_ajaran,
        ]);

        return redirect('siswa')->with('toast_success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'rayon_id' => $request->rayon_id,
            'jurusan_id' => $request->jurusan_id,
            'rombel_id' => $request->rombel_id,
        ]);

        return redirect()->route('siswa.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('siswa')->with('toast_info', 'Data berhasil dihapus!');
    }

    public function siswa()
    {
        $siswa = Siswa::onlyTrashed()->get();
        return view('admin.siswa.trash', ['siswa' => $siswa]);
    }

    public function restoresiswa($id)
    {
        $siswa = Siswa::onlyTrashed()->where('id', $id);
        $siswa->restore();
        return redirect('siswa/trash');
    }

    public function restore_allsiswa()
    {
        $siswa = Siswa::onlyTrashed();
        $siswa->restore();

        return redirect('siswa/trash');
    }

    public function delete_siswa($id)
    {
        $siswa = Siswa::onlyTrashed()->where('id', $id);
        $siswa->forceDelete();

        return redirect('/siswa/trash');
    }

    public function delete_all_siswa()
    {
        $siswa = Siswa::onlyTrashed();
        $siswa->forceDelete();

        return redirect('/siswa/trash');
    }
}
