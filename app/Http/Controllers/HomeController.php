<?php

namespace App\Http\Controllers;

use App\Guru;
use App\User;
use App\Mapel;
use App\Rayon;
use App\Siswa;
use App\Detail;
use App\Jurusan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_user = User::all()->count();
        $jumlah_siswa = Siswa::all()->count();
        $jumlah_guru = Guru::all()->count();
        $jumlah_mapel = Mapel::all()->count();
        $jumlah_rayon = Rayon::all()->count();
        $jumlah_upd = Detail::all()->count();
        $jumlah_jurusan = Jurusan::all()->count();

        return view('home', compact('jumlah_user','jumlah_siswa', 'jumlah_guru', 'jumlah_mapel', 'jumlah_rayon', 'jumlah_upd', 'jumlah_jurusan'));

    }
}
