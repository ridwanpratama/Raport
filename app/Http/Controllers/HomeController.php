<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Admin\Guru;
use App\Models\Admin\Mapel;
use App\Models\Admin\Rayon;
use App\Models\Admin\Siswa;
use App\Models\Admin\Detail;
use Illuminate\Http\Request;
use App\Models\Admin\Jurusan;
use App\Http\Controllers\Controller;

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
    public function index(Request $request)
    {
        $data = [
            'jumlah_user' =>  User::all()->count(),
            'jumlah_siswa' => Siswa::all()->count(),
            'jumlah_guru' => Guru::all()->count(),
            'jumlah_mapel' => Mapel::all()->count(),
            'jumlah_rayon' => Rayon::all()->count(),
            'jumlah_upd' => Detail::all()->count(),
            'jumlah_jurusan' => Jurusan::all()->count(),
        ];
        
        return view('home')->with($data);
    }
}
