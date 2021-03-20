<?php

namespace App\Http\Controllers;

use App\Siswa;
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
}
