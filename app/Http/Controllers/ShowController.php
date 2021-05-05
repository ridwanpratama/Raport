<?php

namespace App\Http\Controllers;

use App\Models\Guru\Upd;
use App\Models\Guru\Absen;
use App\Models\Guru\Nilai;
use App\Models\Admin\Siswa;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use App\Models\Admin\TahunAjaran;
use Maatwebsite\Excel\Facades\Excel;

class ShowController extends Controller
{
    public function show($siswa_id, $tahun_ajaran_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->get();
            $absen = Absen::where('siswa_id', $siswa_id)->firstorFail();
            $upd = Upd::where('siswa_id', $siswa_id)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();
            
        }catch(\Exception $exception){
            return redirect()->route('nilai.index')->with('toast_error', 'Data belum lengkap!');
        }
        // dd($tahun_ajaran);
        return view('guru.nilai.show', compact('nilai','siswa','absen', 'upd','tahun_ajaran'));
    }

    public function mingguan(Request $request, $siswa_id, $tahun_ajaran_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
        
            $startDate = $request->session()->get('startDate');
            $endDate = $request->session()->get('endDate');
            $nilai = Nilai::whereBetween('created_at', [$startDate,$endDate])->where('siswa_id', $siswa_id)->get();

            $absen = Absen::where('siswa_id', $siswa_id)->firstorFail();
            $upd = Upd::where('siswa_id', $siswa_id)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();
            
        }catch(\Exception $exception){
            return redirect()->back()->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.mingguan', compact('nilai','siswa','absen', 'upd','tahun_ajaran'));
    }

    public function print($siswa_id, $tahun_ajaran_id)
    {
        try{
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->get();
            $absen = Absen::where('siswa_id', $siswa_id)->firstorFail();
            $upd = Upd::where('siswa_id', $siswa_id)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();
            
        }catch(\Exception $exception){
            return redirect()->route('nilai.index')->with('toast_error', 'Data belum lengkap!');
        }
        // dd($tahun_ajaran);
        return view('guru.nilai.show', compact('nilai','siswa','absen', 'upd','tahun_ajaran'));
    }

    public function exportNilai()
    {
        $nama_file = 'nilai_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new NilaiExport, $nama_file);
    }

}
