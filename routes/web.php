<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('data_nilai/{siswa_id}', 'ShowController@show')->name('nilai_show');
    Route::get('raport/{siswa_id}', 'ShowController@raport')->name('raport_show');
    Route::resource('siswa', 'SiswaController');
    Route::resource('guru', 'GuruController');
    Route::resource('absen', 'AbsenController');
    Route::resource('upd', 'UpdController');
    Route::resource('user', 'UserController');
    Route::resource('jurusan', 'JurusanController');
    Route::resource('rayon', 'RayonController');
    Route::resource('mapel', 'MapelController');
    Route::resource('detail', 'DetailController');
    Route::resource('nilai', 'NilaiController');
    Route::resource('raport', 'RaportController');

});

Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    
});

Route::middleware(['auth', 'ceklevel:guru'])->group(function () {
    
});