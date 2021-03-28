<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Jurusan;
use App\Nilai;
use App\Rombel;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{

    public function index()
    {
        $nilai = DB::table('nilai_mapel')->distinct()->pluck('siswa_id');
        $data = Nilai::whereIn('siswa_id', $nilai)->groupBy('siswa_id')->get();

        return view('nilai.index', compact('data'));
    }

    public function create()
    {
        $absen = Absen::all();
        return view('nilai.create', compact('absen'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $siswa_id = $request->siswa_id;
        $mapel_id = $request->mapel_id;
        $uh1 = $request->uh1;
        $uh2 = $request->uh2;
        $pts_ganjil = $request->pts_ganjil;
        $uh3 = $request->uh3;
        $uh4 = $request->uh4;
        $pas_ganjil = $request->pas_ganjil;
        $uh5 = $request->uh5;
        $uh6 = $request->uh6;
        $pts_genap = $request->pts_genap;
        $uh7 = $request->uh7;
        $uh8 = $request->uh8;
        $pat = $request->pat;

        $uh1k = $request->uh1k;
        $uh2k = $request->uh2k;
        $pts_ganjilk = $request->pts_ganjilk;
        $uh3k = $request->uh3k;
        $uh4k = $request->uh4k;
        $pas_ganjilk = $request->pas_ganjilk;
        $uh5k = $request->uh5k;
        $uh6k = $request->uh6k;
        $pts_genapk = $request->pts_genapk;
        $uh7k = $request->uh7k;
        $uh8k = $request->uh8k;
        $patk = $request->patk;

        for ($i = 0; $i < count($siswa_id); $i++) {
            $datasave = [
                'siswa_id' => $siswa_id[$i] ?? null,
                'mapel_id' => $mapel_id[$i] ?? null,
                'uh1' => $uh1[$i] ?? null,
                'uh1k' => $uh1k[$i] ?? null,
                // dll
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

        return view('nilai.show.listrombel', compact('rombel'));
    }

    public function input($id)
    {
        $siswa = Siswa::where('rombel_id', $id)->get();

        return view('nilai.input', compact('siswa'));
    }

    public function jurusan()
    {
        $jurusan = Jurusan::all();

        return view('nilai.show.listjurusan', compact('jurusan'));
    }

}
