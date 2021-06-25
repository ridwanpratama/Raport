<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin\Kikd;
use App\Models\Admin\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::distinct()->pluck('nama_mapel');
        $data_mapel = Mapel::whereIn('nama_mapel', $mapel)->groupBy('nama_mapel')->get();
        $jenis_mapel = Mapel::select('jenis_mapel')->get();

        return view('admin.mapel.index', compact('data_mapel','jenis_mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::distinct()->pluck('nama_mapel');
        $data_mapel = Mapel::whereIn('nama_mapel', $mapel)->groupBy('nama_mapel')->get();
        $komp_inti = Kikd::where('jenis_kikd', 'Kompetensi Inti')->get();
        $komp_dasar = Kikd::where('jenis_kikd', 'Kompetensi Dasar')->get();

        return view('admin.mapel.create', compact('data_mapel', 'komp_inti', 'komp_dasar'));
    }

    public function validation(Request $request)
    {
        $validation = $request->validate([
            'nama_mapel' => 'required',
            'guru_id' => 'required',
            'jurusan_id' => 'required',
            'rombel_id' => 'required',
            'ki_kd_id' => 'required',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->ki_kd_id as $value){
            if ($value) {
                DB::table('mapel')->insert([
                    'nama_mapel' => $request->nama_mapel,
                    'guru_id' => $request->guru_id,
                    'jenis_mapel' => $request->jenis_mapel,
                    'jurusan_id' => $request->jurusan_id,
                    'rombel_id' => $request->rombel_id,
                    'kode_mapel' => $request->kode_mapel,
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now(),
                    'ki_kd_id' => $value,
                    'kd' => $request->kd,
                ]);
            }
        }
        return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_mapel = Mapel::find($id);
        return view('admin.mapel.edit', compact('data_mapel'));
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
        $request->validate([
            'jurusan_id' => 'required',
            'rombel_id' => 'required',
        ]);

        $data_mapel = Mapel::find($id);
        $data_mapel->update($request->all());

        return redirect()->back()->with('toast_success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_mapel = Mapel::find($id);
        $data_mapel->delete();
        return redirect()->back()->with('toast_warning', 'Data berhasil dihapus!');
    }

    public function mapel()
    {
        $mapel = Mapel::onlyTrashed()->get();
        return view('admin.mapel.trash', ['mapel' => $mapel]);
    }

    public function restoremapel($id)
    {
        $mapel = Mapel::onlyTrashed()->where('id', $id);
        $mapel->restore();

        return redirect('mapel/trash');
    }

    public function restore_allmapel()
    {
        $mapel = Mapel::onlyTrashed();
        $mapel->restore();

        return redirect('mapel/trash');
    }

    public function delete_mapel($id)
    {
        $mapel = Mapel::onlyTrashed()->where('id', $id);
        $mapel->forceDelete();

        return redirect('/mapel/trash');
    }

    public function delete_all_mapel()
    {
        $mapel = Mapel::onlyTrashed();
        $mapel->forceDelete();

        return redirect('/mapel/trash');
    }

    public function filterJenisMapel($jenis_mapel)
    {
        $mapel = Mapel::distinct()->pluck('nama_mapel');
        $data_mapel = Mapel::whereIn('nama_mapel', $mapel)->where('jenis_mapel', $jenis_mapel)->groupBy('nama_mapel')->get();
        $jenis_mapel = Mapel::select('jenis_mapel')->get();

        return view('admin.mapel.index', compact('data_mapel','jenis_mapel'));
    }

    public function filterJurusan($id)
    {
        $mapel = Mapel::distinct()->pluck('nama_mapel');
        $data_mapel = Mapel::whereIn('nama_mapel',$mapel)->where('jurusan_id', $id)->groupBy('jurusan_id')->get();
        $jenis_mapel = Mapel::select('jenis_mapel')->get();

        return view('admin.mapel.index', compact('data_mapel','jenis_mapel'));
    }

    public function showMapel($nama_mapel)
    {
        $mapel = Mapel::where('nama_mapel', $nama_mapel)->get();
        $identitas = Mapel::where('nama_mapel', $nama_mapel)->first();
        $komp_inti = Kikd::where('jenis_kikd', 'Kompetensi Inti')->get();
        $komp_dasar = Kikd::where('jenis_kikd', 'Kompetensi Dasar')->get();

        return view('admin.mapel.show', compact('mapel','identitas', 'komp_inti', 'komp_dasar'));
    }

}
