<?php

namespace App\Http\Controllers;

use App\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_upd = Detail::get();
        return view('detail.index',compact('detail_upd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detail.create');
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
            'nama_upd' => 'required',
            'guru_id' => 'required'
        ]);

        Detail::create([
            'nama_upd' => $request->get('nama_upd'),
            'guru_id' => $request->get('guru_id')
        ]);

        return redirect()->route('detail.index')->with('toast_success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail_upd = Detail::find($id);
        return view('detail.edit',compact('detail_upd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detail_upd = Detail::find($id);
        $detail_upd->update([
            'nama_upd' => $request->get('nama_upd'),
            'guru_id' => $request->get('guru_id')
        ]);

        return redirect()->route('detail.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_upd = Detail::find($id);
        $detail_upd->delete();
        return redirect('detail')->with('toast_warning', 'Data berhasil dihapus!');
    }
}
