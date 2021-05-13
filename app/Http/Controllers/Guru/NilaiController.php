<?php

namespace App\Http\Controllers\Guru;

use Carbon\Carbon;
use App\Models\Guru\Absen;
use App\Models\Guru\Nilai;
use App\Models\Admin\Mapel;
use App\Models\Admin\Siswa;
use App\Imports\NilaiImport;
use App\Models\Admin\Rombel;
use Illuminate\Http\Request;
use App\Models\Admin\Jurusan;
use App\Models\Admin\JenisNilai;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::distinct()->pluck('siswa_id');
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
                'tahun_ajaran_id' => $request->session()->get('tahun_ajaran'),
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ];
            // return dd($datasave);
            DB::table('nilai_mapel')->insert($datasave);
        }
        return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Nilai::findorFail($id)->update([
            'nilai_pengetahuan' => $data['nilai_pengetahuan'],
            'nilai_keterampilan' => $data['nilai_keterampilan']
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect('nilai')->with('toast_danger', 'Data berhasil dihapus!');
    }

    public function rombel(Request $request, $id)
    {
        $rombel = Rombel::where('jurusan_id', $id)->get();
        $request->session()->put('jurusan_id', $request->id);

        return view('guru.nilai.show.listrombel', compact('rombel'));
    }

    public function input(Request $request, $id)
    {
        $siswa = Siswa::where('rombel_id', $id)->get();
        $mapel = Mapel::where('jurusan_id', $request->session()->get('jurusan_id'))->get();
        $jenis_nilai = JenisNilai::whereNotIn('id', array(13,14,15,16,17,18,19,20,21,22,23,24,24))->get();

        return view('guru.nilai.input', compact('siswa','mapel','jenis_nilai'));
    }

    public function jurusan()
    {
        $jurusan = Jurusan::all();

        return view('guru.nilai.show.listjurusan', compact('jurusan'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new NilaiImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('nilai.index')->with(['toast_success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('nilai.index')->with(['toast_error' => 'Data Gagal Diimport!']);
        }
    }

}
