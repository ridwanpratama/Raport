<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_jurusan = Jurusan::get();
        return view('jurusan.index',compact('data_jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_jurusan' => 'required'
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->get('nama_jurusan')
        ]);

        return redirect()->route('jurusan.index')->with('toast_success', 'Data berhasil disimpan!');
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
        $data_jurusan = Jurusan::find($id);
        return view('jurusan.edit',compact('data_jurusan'));
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
        $data_jurusan = Jurusan::find($id);
        $data_jurusan->update([
            'nama_jurusan' => $request->get('nama_jurusan')
        ]);

        return redirect()->route('jurusan.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_jurusan = Jurusan::find($id);
        $data_jurusan->delete();
        return redirect('jurusan')->with('toast_warning', 'Data berhasil dihapus!');
    }
}
