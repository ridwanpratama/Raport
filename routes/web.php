<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    Route::prefix('siswa')->group(function () {
        //Soft Deletes CRUD Siswa
        Route::get('/trash', 'Admin\SiswaController@siswa')->name('trash.siswa');
        Route::get('/restore/{id}', 'Admin\SiswaController@restoresiswa')->name('trash.restore');
        Route::get('/restore_all', 'Admin\SiswaController@restore_allsiswa')->name('restore.siswa');
        Route::get('/delete/{id}', 'Admin\SiswaController@delete_siswa')->name('delete.siswa');
        Route::get('/deleteall', 'Admin\SiswaController@delete_all_siswa')->name('deleteall.siswa');

        //Filter siswa
        Route::get('/jurusan/{id}', 'Admin\SiswaController@filterJurusan')->name('filterJurusan');
        Route::get('/rayon/{id}', 'Admin\SiswaController@filterRayon')->name('filterRayon');
        Route::get('/rombel/{id}', 'Admin\SiswaController@filterRombel')->name('filterRombel');
    });

    Route::prefix('rayon')->group(function () {
        //Soft Deletes CRUD Rayon
        Route::get('/trash', 'Admin\RayonController@rayon')->name('trash.rayon');
        Route::get('/restore/{id}', 'Admin\RayonController@restorerayon')->name('trashrayon.restore');
        Route::get('/restore_all', 'Admin\RayonController@restore_allrayon')->name('restore.rayon');
        Route::get('/delete/{id}', 'Admin\RayonController@delete_rayon')->name('delete.rayon');
        Route::get('/deleteall', 'Admin\RayonController@delete_all_rayon')->name('deleteall.rayon');
    });

    Route::prefix('jurusan')->group(function () {
        //Soft Deletes CRUD Jurusan
        Route::get('/trash', 'Admin\JurusanController@jurusan')->name('trash.jurusan');
        Route::get('/restore/{id}', 'Admin\JurusanController@restorejurusan')->name('trashjurusan.restore');
        Route::get('/restore_all', 'Admin\JurusanController@restore_alljurusan')->name('restore.jurusan');
        Route::get('/delete/{id}', 'Admin\JurusanController@delete_jurusan')->name('delete.jurusan');
        Route::get('/deleteall', 'Admin\JurusanController@delete_all_jurusan')->name('deleteall.jurusan');
    });

    Route::prefix('guru')->group(function () {
        //Soft Deletes CRUD Guru
        Route::get('/trash', 'Admin\GuruController@guru')->name('trash.guru');
        Route::get('/restore/{id}', 'Admin\GuruController@restoreguru')->name('trashguru.restore');
        Route::get('/restore_all', 'Admin\GuruController@restore_allguru')->name('restore.guru');
        Route::get('/delete/{id}', 'Admin\GuruController@delete_guru')->name('delete.guru');
        Route::get('/deleteall', 'Admin\GuruController@delete_all_guru')->name('deleteall.guru');
    });

    Route::prefix('detail')->group(function () {
        //Soft Deletes CRUD Detail UPD
        Route::get('/trash', 'Admin\DetailController@detail')->name('trash.detail');
        Route::get('/restore/{id}', 'Admin\DetailController@restoredetail')->name('trashdetail.restore');
        Route::get('/restore_all', 'Admin\DetailController@restore_alldetail')->name('restore.detail');
        Route::get('/delete/{id}', 'Admin\DetailController@delete_detail')->name('delete.detail');
        Route::get('/deleteall', 'Admin\DetailController@delete_all_detail')->name('deleteall.detail');
    });

    Route::prefix('mapel')->group(function () {
        //Soft Deletes CRUD Mapel
        Route::get('/trash', 'Admin\MapelController@mapel')->name('trash.mapel');
        Route::get('/restore/{id}', 'Admin\MapelController@restoremapel')->name('trashmapel.restore');
        Route::get('/restore_all', 'Admin\MapelController@restore_allmapel')->name('restore.mapel');
        Route::get('/delete/{id}', 'Admin\MapelController@delete_mapel')->name('delete.mapel');
        Route::get('/deleteall', 'Admin\MapelController@delete_all_mapel')->name('deleteall.mapel');

        Route::get('/jenismapel/{jenis_mapel}', 'Admin\MapelController@filterJenisMapel')->name('filterJenisMapel');
        Route::get('/jurusan/{id}', 'Admin\MapelController@filterJurusan')->name('filterJurusan');

        Route::get('/detail/{nama_mapel}', 'Admin\MapelController@showMapel')->name('show_mapel');
    });

    Route::prefix('user')->group(function () {
        //Soft Deletes CRUD USER
        Route::get('/trash', 'Admin\UserController@user')->name('trash.user');
        Route::get('/restore/{id}', 'Admin\UserController@restoreuser')->name('trashuser.restore');
        Route::get('/restore_all', 'Admin\UserController@restore_alluser')->name('restore.user');
        Route::get('/delete/{id}', 'Admin\UserController@delete_user')->name('delete.user');
        Route::get('/deleteall', 'Admin\UserController@delete_all_user')->name('deleteall.user');
    });

    Route::resource('siswa', 'Admin\SiswaController');
    Route::resource('guru', 'Admin\GuruController');
    Route::resource('rayon', 'Admin\RayonController');
    Route::resource('mapel', 'Admin\MapelController');
    Route::resource('detail', 'Admin\DetailController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('jurusan', 'Admin\JurusanController');
    Route::resource('rombel', 'Admin\RombelController');
    Route::resource('tahun_ajaran', 'Admin\TahunAjaranController');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('nilai')->group(function () {
        Route::get('/export', 'ShowController@exportNilai')->name('export_nilai');
        Route::get('/rombel/{id}', 'Guru\NilaiController@rombel')->name('list_rombel');
        Route::get('/jurusan', 'Guru\NilaiController@jurusan')->name('list_jurusan');
        Route::get('/input/{id}', 'Guru\NilaiController@input')->name('input_nilai');
        Route::post('/input', 'Guru\NilaiController@store')->name('store_nilai');
    });

    Route::get('data_nilai/{siswa_id}/{tahun_ajaran_id}', 'ShowController@show')->name('nilai_show');
    Route::get('data_nilai/mingguan/{siswa_id}/{tahun_ajaran_id}', 'ShowController@mingguan')->name('nilai_mingguan');
    Route::post('/data_nilai/import', 'Guru\NilaiController@import')->name('import_nilai');

    Route::get('raport1/{siswa_id}', 'Guru\RaportController@raport1')->name('raport1_show');
    Route::get('raport2/{siswa_id}', 'Guru\RaportController@raport2')->name('raport2_show');
    Route::get('raport3/{siswa_id}', 'Guru\RaportController@raport3')->name('raport3_show');
    Route::get('raport4/{siswa_id}', 'Guru\RaportController@raport4')->name('raport4_show');
    Route::get('raport5/{siswa_id}', 'Guru\RaportController@raport5')->name('raport5_show');
    Route::get('raport6/{siswa_id}', 'Guru\RaportController@raport6')->name('raport6_show');

    Route::get('mid1/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid1')->name('mid1');
    Route::get('mid2/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid2')->name('mid2');
    Route::get('mid3/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid3')->name('mid3');
    Route::get('mid4/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid4')->name('mid4');
    Route::get('mid5/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid5')->name('mid5');
    Route::get('mid6/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid6')->name('mid6');
    Route::get('mid7/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid7')->name('mid7');
    Route::get('mid8/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid8')->name('mid8');
    Route::get('mid9/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid9')->name('mid9');
    Route::get('mid10/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid10')->name('mid10');
    Route::get('mid11/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid11')->name('mid11');
    Route::get('mid12/{siswa_id}/{tahun_ajaran_id}', 'Guru\RaportController@mid12')->name('mid12');

    Route::get('/raport/search', 'Guru\RaportController@search');

    Route::resource('absen', 'Guru\AbsenController');
    Route::resource('upd', 'Guru\UpdController');
    Route::resource('nilai', 'Guru\NilaiController');
    Route::resource('raport', 'Guru\RaportController');
});