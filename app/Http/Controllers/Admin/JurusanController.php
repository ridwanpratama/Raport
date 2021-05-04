<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Jurusan;
use Illuminate\Http\Request;

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
        return view('admin.jurusan.index', compact('data_jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_jurusan' => 'required',
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('jurusan.index')->with('toast_success', 'Data berhasil disimpan!');
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
        return view('admin.jurusan.edit', compact('data_jurusan'));
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
            'nama_jurusan' => $request->nama_jurusan,
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

    public function jurusan()
    {
        $jurusan = Jurusan::onlyTrashed()->get();
        return view('admin.jurusan.trash', ['jurusan' => $jurusan]);
    }

    public function restorejurusan($id)
    {
        $jurusan = Jurusan::onlyTrashed()->where('id', $id);
        $jurusan->restore();

        return redirect('jurusan/trash');
    }

    public function restore_alljurusan()
    {
        $jurusan = Jurusan::onlyTrashed();
        $jurusan->restore();

        return redirect('jurusan/trash');
    }

    public function delete_jurusan($id)
    {
        $jurusan = Jurusan::onlyTrashed()->where('id', $id);
        $jurusan->forceDelete();

        return redirect('/jurusan/trash');
    }

    public function delete_all_jurusan()
    {
        $jurusan = Jurusan::onlyTrashed();
        $jurusan->forceDelete();

        return redirect('/jurusan/trash');
    }
}
