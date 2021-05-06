<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Admin\Siswa;
use App\Models\Admin\TahunAjaran;
use App\Models\Guru\Absen;
use App\Models\Guru\Nilai;
use App\Models\Guru\Upd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaportController extends Controller
{
    public function index()
    {
        $nilai = Nilai::distinct()->pluck('siswa_id');
        $data = Nilai::whereIn("siswa_id", $nilai)->groupBy('siswa_id')->get();

        return view('guru.raport.index', compact('data'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'startDate' => 'required',
            'endDate' => 'required',
        ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $startDate = $from . ' 00:00:00';
        $endDate = $to . ' 23:59:59';

        $request->session()->put('startDate', $startDate);
        $request->session()->put('endDate', $endDate);

        $distinct = Nilai::distinct()->pluck('siswa_id');
        $nilai = Nilai::whereIn("siswa_id", $distinct)->whereBetween('created_at', [$startDate, $endDate])->groupBy('siswa_id')->get();

        return view('guru.raport.index', compact('nilai', 'startDate', 'endDate'));
    }

    // don't mind me, i just want this to complete already. tbh i can't find other way yet
    // seriously, such a catastrophic line of code
    // don't follow my way
    // any help would be appreciated
    // i'm sorry :(

    public function raport1($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester1 = ['siswa_id' => $siswa_id, 'semester' => '1'];
            $nilai = Nilai::where($semester1)->get();

            $absen1 = ['siswa_id' => $siswa_id, 'semester' => '1'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($absen1)
                ->get();

            $upd1 = ['siswa_id' => $siswa_id, 'semester' => '1'];

            $upd = Upd::where($upd1)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function raport2($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester2 = ['siswa_id' => $siswa_id, 'semester' => '2'];
            $nilai = Nilai::where($semester2)->get();

            $absen2 = ['siswa_id' => $siswa_id, 'semester' => '2'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($absen2)
                ->get();

            $upd2 = ['siswa_id' => $siswa_id, 'semester' => '2'];
            $upd = Upd::where($upd2)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd'));
    }

    public function raport3($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester3 = ['siswa_id' => $siswa_id, 'semester' => '3'];
            $nilai = Nilai::where($semester3)->get();

            $absen3 = ['siswa_id' => $siswa_id, 'semester' => '3'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($absen3)
                ->get();

            $upd3 = ['siswa_id' => $siswa_id, 'semester' => '3'];
            $upd = Upd::where($upd3)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd'));
    }

    public function raport4($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester4 = ['siswa_id' => $siswa_id, 'semester' => '4'];
            $nilai = Nilai::where($semester4)->get();

            $absen4 = ['siswa_id' => $siswa_id, 'semester' => '4'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($absen4)
                ->get();

            $upd4 = ['siswa_id' => $siswa_id, 'semester' => '4'];
            $upd = Upd::where($upd4)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai_smt4', 'siswa', 'absen', 'upd'));
    }

    public function raport5($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester5 = ['siswa_id' => $siswa_id, 'semester' => '5'];
            $nilai = Nilai::where($semester5)->get();

            $absen5 = ['siswa_id' => $siswa_id, 'semester' => '5'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($absen5)
                ->get();

            $upd5 = ['siswa_id' => $siswa_id, 'semester' => '5'];
            $upd = Upd::where($upd5)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd'));
    }

    public function raport6($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();

            $semester6 = ['siswa_id' => $siswa_id, 'semester' => '6'];
            $nilai = Nilai::where($semester6)->get();

            $absen6 = ['siswa_id' => $siswa_id, 'semester' => '6'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($absen6)
                ->get();

            $upd5 = ['siswa_id' => $siswa_id, 'semester' => '6'];
            $upd = Upd::where($upd6)->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd'));
    }

    public function mid1($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(1, 2, 3))->get();

            $mid1 = ['siswa_id' => $siswa_id, 'semester' => '1'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid1)->whereIn('jenis_nilai_id', array(1, 2, 3))
                ->get();

            $upd = Upd::where($mid1)->whereIn('jenis_nilai_id', array(1, 2, 3))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid2($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(4, 5, 6))->get();

            $mid2 = ['siswa_id' => $siswa_id, 'semester' => '1'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid2)->whereIn('jenis_nilai_id', array(4, 5, 6))
                ->get();

            $upd = Upd::where($mid2)->whereIn('jenis_nilai_id', array(4, 5, 6))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid3($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(7, 8, 9))->get();

            $mid3 = ['siswa_id' => $siswa_id, 'semester' => '2'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid3)->whereIn('jenis_nilai_id', array(7, 8, 9))
                ->get();

            $upd = Upd::where($mid3)->whereIn('jenis_nilai_id', array(7, 8, 9))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid4($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(10, 11, 12))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '2'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(10, 11, 12))
                ->get();

            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(10, 11, 12))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid5($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(1, 2, 3))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '3'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(1, 2, 3))
                ->get();

            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(1, 2, 3))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid6($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(4, 5, 6))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '3'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(4, 5, 6))
                ->get();

            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(4, 5, 6))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid7($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(7, 8, 9))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '4'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(7, 8, 9))
                ->get();

            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(7, 8, 9))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid8($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(10, 11, 12))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '4'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(10, 11, 12))
                ->get();

            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(10, 11, 12))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid9($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(1, 2, 3))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '5'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(1, 2, 3))
                ->get();

            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(1, 2, 3))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid10($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(4, 5, 6))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '5'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(4, 5, 6))
                ->get();
            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(4, 5, 6))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid11($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(7, 8, 9))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '6'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(7, 8, 9))
                ->get();

            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(7, 8, 9))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

    public function mid12($siswa_id, $tahun_ajaran_id)
    {
        try {
            $siswa = Siswa::where('id', $siswa_id)->firstorFail();
            $nilai = Nilai::where('siswa_id', $siswa_id)->whereIn('jenis_nilai_id', array(10, 11, 12))->get();

            $mid = ['siswa_id' => $siswa_id, 'semester' => '6'];
            $absen = Absen::select("*", DB::raw('SUM(alpha) as alpha'), DB::raw('SUM(Absen.sakit) as sakit'),
                DB::raw('SUM(Absen.izin) as izin'))
                ->where($mid)->whereIn('jenis_nilai_id', array(10, 11, 12))
                ->get();

            $upd = Upd::where($mid)->whereIn('jenis_nilai_id', array(10, 11, 12))->firstorFail();
            $tahun_ajaran = TahunAjaran::where('id', $tahun_ajaran_id)->firstorFail();

        } catch (\Exception $exception) {
            return redirect()->route('raport.index')->with('toast_error', 'Data belum lengkap!');
        }

        return view('guru.raport.show', compact('nilai', 'siswa', 'absen', 'upd', 'tahun_ajaran'));
    }

}
