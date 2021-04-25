<?php

namespace App\Http\Controllers;

use App\Models\Admin\Guru;
use App\Models\Admin\Rayon;
use App\Models\Admin\Siswa;
use App\Models\Admin\Detail;
use Illuminate\Http\Request;
use App\Models\Admin\Jurusan;

class TrashController extends Controller
{
    public function siswa()
    {
        $siswa = Siswa::onlyTrashed()->get();
        return view('admin.siswa.trash', ['siswa' => $siswa]);
    }

    public function restoresiswa($id)
    {
    	$siswa = Siswa::onlyTrashed()->where('id',$id);
    	$siswa->restore();
    	return redirect('siswa/trash');
    }

    public function restore_allsiswa()
    {
        $siswa = Siswa::onlyTrashed();
        $siswa->restore();

        return redirect('siswa/trash');
    }

    public function delete_siswa($id)
    {
    	$siswa = Siswa::onlyTrashed()->where('id',$id);
    	$siswa->forceDelete();

    	return redirect('/siswa/trash');
    }

    public function delete_all_siswa()
    {
    	$siswa = Siswa::onlyTrashed();
    	$siswa->forceDelete();

    	return redirect('/siswa/trash');
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

    public function delete_rayon($id){
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

    public function delete_jurusan($id){
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

    public function guru()
    {
        $guru = Guru::onlyTrashed()->get();
        return view('admin.guru.trash', ['guru'  => $guru]);
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

    public function detail()
    {
        $detail = Detail::onlyTrashed()->get();
        return view('admin.detail.trash', ['detail' => $detail]);
    }

    public function restoredetail($id)
    {
        $detail = Detail::onlyTrashed()->where('id', $id);
        $detail->restore();

        return redirect('detail/trash');
    }

    public function restore_alldetail()
    {
        $detail = Detail::onlyTrashed();
        $detail->restore();

        return redirect('detail/trash');
    }

    public function delete_detail($id)
    {
        $detail = Detail::onlyTrashed()->where('id', $id);
        $detail->forceDelete();

        return redirect('/detail/trash');
    }

    public function delete_all_detail()
    {
        $detail = Detail::onlyTrashed();
        $detail->forceDelete();

        return redirect('/detail/trash');
    }

    public function mapel()
    {
        $mapel = Mapel::onlyTrashed()->get();
        return view('mapel.trash', ['mapel' => $mapel]);
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

    public function user()
    {
        $user = User::onlyTrashed()->get();
        return view('auth.user.trash', ['user' => $user]);
    }

    public function restoreuser($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();

        return redirect('user/trash');
    }

    public function restore_alluser()
    {
        $user = User::onlyTrashed();
        $user->restore();

        return redirect('user/trash');
    }

    public function delete_user($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->forceDelete();

        return redirect('user/trash');
    }

    public function delete_all_user()
    {
        $user = User::onlyTrashed();
        $user->forceDelete();

        return redirect('user/trash');
    }
}
