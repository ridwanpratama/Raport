<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kikd;
use Illuminate\Http\Request;

class KikdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kikd = Kikd::get();
        return view('admin.kikd.index', compact('data_kikd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kikd.create');
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
          'ki' => 'required',
          'kd' => 'required',
        ]);

        Kikd::create([
          'ki' => $request->ki,
          'kd' => $request->kd,
      ]);

      return redirect()->route('kikd.index')->with('toast_success', 'Data berhasil disimpan!');
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
        $data_kikd = Kikd::find($id);
        return view('admin.kikd.edit', compact('data_kikd'));
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
        $data_kikd = Kikd::find($id);
        $data_kikd->update([
          'ki' => $request->ki,
          'kd' => $request->kd,
        ]);

        return redirect()->route('kikd.index')->with('toast_success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data_kikd = Kikd::find($id);
      $data_kikd->delete();
      return redirect('kikd')->with('toast_warning', 'Data berhasil dihapus!');
    }
}

