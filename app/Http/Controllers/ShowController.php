<?php

namespace App\Http\Controllers;

use App\Upd;
use App\Absen;
use App\Nilai;
use App\Siswa;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ShowController extends Controller
{
    public function show($siswa_id)
    {
        $data = Nilai::sum(\DB::raw('uh1 + uh1k'));
        dd($data);
        // try{
        //     $siswa = Siswa::where('id', $siswa_id)->firstorFail();
        //     $nilai = Nilai::where('siswa_id', $siswa_id)->get();
        //     $absen = Absen::where('siswa_id', $siswa_id)->firstorFail();
        //     $upd = Upd::where('siswa_id', $siswa_id)->firstorFail();
        // }catch(\Exception $exception){
        //     return redirect()->route('nilai.index')->with('toast_error', 'Data belum lengkap!');
        // }
        

        // return view('nilai.show', compact('nilai','siswa','absen', 'upd'));
    }

    public function raport($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->get();
            $absen = Absen::where('siswa_id', $siswa_id)->firstorFail();
            $upd = Upd::where('siswa_id', $siswa_id)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('raport.show', compact('nilai','siswa','absen', 'upd'));
    }

    public function exportNilai() 
    {
        $nama_file = 'nilai_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new NilaiExport, $nama_file);
    }

}
