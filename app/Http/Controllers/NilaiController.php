<?php

namespace App\Http\Controllers;

use App\Upd;
use App\Absen;
use App\Nilai;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = DB::table('nilai_mapel')->distinct()->pluck('siswa_id');
        $data = Nilai::whereIn('siswa_id',$nilai)->groupBy('siswa_id')->get();
        
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
        $rombel = $request->rombel;
        $rayon_id = $request->rayon_id;
        $jurusan_id = $request->jurusan_id;
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
       

        foreach($mapel_id as $key => $mapel)
        {
            $input['siswa_id'] = $siswa_id;
            $input['rombel'] = $rombel;
            $input['rayon_id'] = $rayon_id;
            $input['jurusan_id'] = $jurusan_id;
            $input['mapel_id'] = $mapel;
            $input['uh1'] = $uh1[$key];
            $input['uh2'] = $uh2[$key];
            $input['pts_ganjil'] = $pts_ganjil[$key];
            $input['uh3'] = $uh3[$key];
            $input['uh4'] = $uh4[$key];
            $input['pas_ganjil'] = $pas_ganjil[$key];
            $input['uh5'] = $uh5[$key];
            $input['uh6'] = $uh6[$key];
            $input['pts_genap'] = $pts_genap[$key];
            $input['uh7'] = $uh7[$key];
            $input['uh8'] = $uh8[$key];
            $input['pat'] = $pat[$key];

            $jumlah = $uh1[$key] + $uh2[$key] + $pts_ganjil[$key] + $uh3[$key] + $uh4[$key] + $pas_ganjil[$key] + $uh5[$key] + $uh6[$key] + $pts_genap[$key] + $uh7[$key] + $uh8[$key] + $pat[$key];
            $rata_rata[] = $jumlah / 12;
            
            $input['rata_rata'] = $rata_rata[$key];

            if($rata_rata[$key] <= 75){
                $predikat = "Belum Kompeten";
            }else{
                $predikat = "Kompeten";
            }

            $input['predikat'] = $predikat;

            Nilai::create($input);

        }

        return redirect()->route('nilai.create')->with('success', 'Data berhasil disimpan!');
    }
 
}