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
       

        foreach($mapel_id as $key => $mapel)
        {
            $input['siswa_id'] = $siswa_id;
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

            $input['uh1k'] = $uh1k[$key];
            $input['uh2k'] = $uh2k[$key];
            $input['pts_ganjilk'] = $pts_ganjilk[$key];
            $input['uh3k'] = $uh3k[$key];
            $input['uh4k'] = $uh4k[$key];
            $input['pas_ganjilk'] = $pas_ganjilk[$key];
            $input['uh5k'] = $uh5k[$key];
            $input['uh6k'] = $uh6k[$key];
            $input['pts_genapk'] = $pts_genapk[$key];
            $input['uh7k'] = $uh7k[$key];
            $input['uh8k'] = $uh8k[$key];
            $input['patk'] = $patk[$key];

            $jumlah = $uh1[$key] + $uh2[$key] + $pts_ganjil[$key] + $uh3[$key] + $uh4[$key] + $pas_ganjil[$key] + $uh5[$key] + $uh6[$key] + $pts_genap[$key] + $uh7[$key] + $uh8[$key] + $pat[$key];

            $jumlahk = $uh1k[$key] + $uh2k[$key] + $pts_ganjilk[$key] + $uh3k[$key] + $uh4k[$key] + $pas_ganjilk[$key] + $uh5k[$key] + $uh6k[$key] + $pts_genapk[$key] + $uh7k[$key] + $uh8k[$key] + $patk[$key];
            
            $rata1 = $jumlah / 12;
            $rata2= $jumlahk / 12;
    
            $rata_rata[] = $jumlah / 12;
            $rata_ratak[] = $jumlahk / 12;
            
            $input['rata_rata'] = $rata_rata[$key];
            $input['rata_ratak'] = $rata_ratak[$key];

            if($rata_rata[$key] <= 75){
                $predikat = "Belum Kompeten";
            }else{
                $predikat = "Kompeten";
            }

            if($rata_ratak[$key] <= 75){
                $predikatk = "Belum Kompeten";
            }else{
                $predikatk = "Kompeten";
            }

            $input['predikat'] = $predikat;
            $input['predikatk'] = $predikatk;

            $total[] = ($rata1 + $rata2) / 2;
            
            if($total[$key] > 89){
                $ket = "A";
            }else if($total[$key] > 79){
                $ket = "B";
            }else if($total[$key] > 69){
                $ket = "C";
            }else if($total[$key] > 59){
                $ket = "D";
            }else{
                $ket = "E";
            }

            // dd($ket);

            $input['ket'] = $ket;

            Nilai::create($input);

        }

        return redirect()->route('nilai.create')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect('nilai')->with('toast_danger', 'Data berhasil dihapus!');
    }
 
}