<?php

namespace App\Http\Controllers;

use App\Upd;
use App\Absen;
use App\Nilai;
use App\Siswa;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->get();
            // dd($nilai);
            $absen = Absen::where('siswa_id', $siswa_id)->firstorFail();
            
            $upd = Upd::where('siswa_id', $siswa_id)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('nilai.index')->with('toast_error', 'Data belum lengkap!');
        }
        

        return view('nilai.show', compact('nilai','siswa','absen', 'upd'));
    }

    public function raport($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->get();
            $absen = Absen::where('siswa_id', $siswa_id)->firstorFail();
            // $siswa = Siswa::where('siswa_id', $siswa_id)->first();
            $upd = Upd::where('siswa_id', $siswa_id)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('raport.show', compact('nilai','siswa','absen', 'upd'));
    }

}
