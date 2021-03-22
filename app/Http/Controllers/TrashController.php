<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Siswa;
use App\Rayon;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function siswa()
    {
        $siswa = Siswa::onlyTrashed()->get();
        return view('siswa.trash', ['siswa' => $siswa]);
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
        return view('rayon.trash', ['rayon' => $rayon]);
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

    public function guru()
    {
        $guru = Guru::onlyTrashed()->get();
        return view('guru.trash', ['guru'  => $guru]);
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
