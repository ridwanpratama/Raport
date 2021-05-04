<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Guru::all();

        return view('admin.guru.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'jk' => 'required',
            'no_telp' => 'required',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('toast_success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required',
            'jk' => 'required',
            'no_telp' => 'required',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('toast_success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')->with('toast_warning', 'Data berhasil dihapus!');
    }

    public function guru()
    {
        $guru = Guru::onlyTrashed()->get();
        return view('admin.guru.trash', ['guru' => $guru]);
    }

    public function restoreguru($id)
    {
        $guru = Guru::onlyTrashed()->where('id', $id);
        $guru->restore();

        return redirect('guru/trash');
    }

    public function restore_allguru()
    {
        $guru = Guru::onlyTrashed();
        $guru->restore();

        return redirect('guru/trash');
    }

    public function delete_guru($id)
    {
        $guru = Guru::onlyTrashed()->where('id', $id);
        $guru->forceDelete();

        return redirect('/guru/trash');
    }

    public function delete_all_guru()
    {
        $guru = Guru::onlyTrashed();
        $guru->forceDelete();

        return redirect('/guru/trash');
    }
}
