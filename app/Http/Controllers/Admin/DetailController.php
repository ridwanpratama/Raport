<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.detail.index',compact('detail_upd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.detail.create');
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
            'nama_upd' => $request->nama_upd,
            'guru_id' => $request->guru_id
        ]);

        return redirect()->route('detail.index')->with('toast_success', 'Data berhasil disimpan!');
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
        return view('admin.detail.edit',compact('detail_upd'));
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
            'nama_upd' => $request->nama_upd,
            'guru_id' => $request->guru_id
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
