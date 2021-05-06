<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru\Absen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Siswa;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::all();
        return view('guru.absen.index', compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.absen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $absenBaru = new Absen();

        $absenBaru->siswa_id = $request->siswa_id;
        $absenBaru->sakit = $request->sakit;
        $absenBaru->izin = $request->izin;
        $absenBaru->alpha = $request->alpha;
        $absenBaru->semester = $request->semester;

        $absenBaru->save();

        return redirect(route('absen.index'))->with('toast_success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absen = Absen::find($id);
        $siswa = Siswa::all();
        return view('guru.absen.edit', compact('absen', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $absen = Absen::find($id);
        $absen->update([
            'siswa_id' => $request->siswa_id,
            'sakit' => $request->sakit,
            'izin' => $request->izin,
            'alpha' => $request->alpha,
            'semester' => $request->semester
        ]);

        return redirect()->route('absen.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = Absen::find($id);
        $absen->delete();
        return redirect(route('absen.index'))->with('toast_warning', 'Data berhasil dihapus!');
    }
}
