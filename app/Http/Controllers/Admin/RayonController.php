<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Guru;
use App\Models\Admin\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayons = Rayon::with('guru')->orderBy('created_at', 'DESC')->get();

        return view('admin.rayon.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Guru::orderBy('nama_guru', 'ASC')->get();

        return view('admin.rayon.create', compact('teachers'));
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
            'nama_rayon' => 'required',
            'guru_id' => 'required',
        ]);

        Rayon::create($request->all());

        return redirect()->route('rayon.index')
            ->with('toast_success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = guru::all();
        $rayon = rayon::find($id);
        $selectguru = Guru::find($rayon->guru_id);

        return view('admin.rayon.edit', compact('selectguru', 'rayon', 'guru'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rayon $rayon)
    {
        $request->validate([
            'nama_rayon' => 'required',
            'guru_id' => 'required',
        ]);

        $rayon->update($request->all());

        return redirect()->route('rayon.index')
            ->with('toast_success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();

        return redirect()->route('rayon.index')
            ->with('toast_warning', 'Data berhasil dihapus');
    }

    public function rayon()
    {
        $rayon = Rayon::onlyTrashed()->get();
        return view('admin.rayon.trash', ['rayon' => $rayon]);
    }

    public function restorerayon($id)
    {
        $rayon = Rayon::onlyTrashed()->where('id', $id);
        $rayon->restore();

        return redirect('rayon/trash');
    }

    public function restore_allrayon()
    {
        $rayon = Rayon::onlyTrashed();
        $rayon->restore();

        return redirect('rayon/trash');
    }

    public function delete_rayon($id)
    {
        $rayon = Rayon::onlyTrashed()->where('id', $id);
        $rayon->forceDelete();

        return redirect('/rayon/trash');
    }

    public function delete_all_rayon()
    {
        $rayon = Rayon::onlyTrashed();
        $rayon->forceDelete();

        return redirect('/rayon/trash');
    }
}
