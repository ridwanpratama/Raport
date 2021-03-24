<?php

namespace App\Http\Controllers;

use App\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    public function validation(Request $request)
    {
        $validation = $request->validate([
            'nama_rombel' => 'required'
        ]);
    }

    public function index()
    {
        $rombel = Rombel::all();
        return view('rombel.index',compact('rombel'));
    }

    public function create()
    {
        return view('rombel.create');
    }

    public function store(Request $request)
    {
        $this->validation($request);

        Rombel::create([
            'nama_rombel' => $request->nama_rombel,
        ]);

        return redirect('rombel')->with('toast_success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $rombel = Rombel::find($id);
        return view('rombel.edit',compact('rombel'));
    }

    public function update(Request $request, $id)
    {
        $rombel = Rombel::find($id);
        $rombel->update([
            'nama_rombel' => $request->get('nama_rombel')
        ]);

        return redirect()->route('rombel.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $rombel = Rombel::find($id);
        $rombel->delete();
        return redirect('rombel')->with('toast_danger', 'Data berhasil dihapus!');
    }

}
