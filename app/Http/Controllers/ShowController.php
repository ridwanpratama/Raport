<?php

namespace App\Http\Controllers;

use App\Models\Guru\Upd;
use App\Models\Guru\Absen;
use App\Models\Guru\Nilai;
use App\Models\Admin\Siswa;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ShowController extends Controller
{
    public function show($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->get();
            $absen = Absen::where('siswa_id', $siswa_id)->firstorFail();
            $upd = Upd::where('siswa_id', $siswa_id)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('nilai.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.nilai.show', compact('nilai','siswa','absen', 'upd'));
    }

    // don't mind me, i just want this to complete already. tbh i can't find other way yet

    public function raport1($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester1 = ['siswa_id' => $siswa_id, 'semester' => '1'];
            $nilai = Nilai::where($semester1)->get();

            $absen1 = ['siswa_id' => $siswa_id, 'semester' => '1' ];
            $absen = Absen::where($absen1)->firstorFail();

            $upd1 = ['siswa_id' => $siswa_id, 'semester' => '1'];
            $upd = Upd::where($upd1)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai','siswa','absen', 'upd'));
    }

    public function raport2($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester2 = ['siswa_id' => $siswa_id, 'semester' => '2'];
            $nilai = Nilai::where($semester2)->get();

            $absen2 = ['siswa_id' => $siswa_id, 'semester' => '2' ];
            $absen = Absen::where($absen2)->firstorFail();

            $upd2 = ['siswa_id' => $siswa_id, 'semester' => '2'];
            $upd = Upd::where($upd2)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai','siswa','absen', 'upd'));
    }

    public function raport3($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester3 = ['siswa_id' => $siswa_id, 'semester' => '3'];
            $nilai = Nilai::where($semester3)->get();

            $absen3 = ['siswa_id' => $siswa_id, 'semester' => '3' ];
            $absen = Absen::where($absen3)->firstorFail();

            $upd3 = ['siswa_id' => $siswa_id, 'semester' => '3'];
            $upd = Upd::where($upd3)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai','siswa','absen', 'upd'));
    }

    public function raport4($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester4 = ['siswa_id' => $siswa_id, 'semester' => '4'];
            $nilai = Nilai::where($semester4)->get();

            $absen4 = ['siswa_id' => $siswa_id, 'semester' => '4' ];
            $absen = Absen::where($absen4)->firstorFail();

            $upd4 = ['siswa_id' => $siswa_id, 'semester' => '4'];
            $upd = Upd::where($upd4)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai_smt4','siswa','absen', 'upd'));
    }

    public function raport5($siswa_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester5 = ['siswa_id' => $siswa_id, 'semester' => '5'];
            $nilai = Nilai::where($semester5)->get();

            $absen5 = ['siswa_id' => $siswa_id, 'semester' => '5' ];
            $absen = Absen::where($absen5)->firstorFail();

            $upd5 = ['siswa_id' => $siswa_id, 'semester' => '5'];
            $upd = Upd::where($upd5)->firstorFail();
        }catch(\Exception $exception){
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai','siswa','absen', 'upd'));
    }

    public function exportNilai()
    {
        $nama_file = 'nilai_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new NilaiExport, $nama_file);
    }


}
