@extends('layouts.app')
@section('title', 'Tambah Data Guru')
@section('pagetitle')
    <h1>Tambah Data Guru</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('guru.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Nama Guru</label>
                            <div class="col-md-9">
                                <input class="form-control" id="nama_guru" type="text" name="nama_guru"
                                    placeholder="Masukkan nama guru">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <select class="form-control" id="jk" name="jk">
                                    <option>--Pilih Jenis Kelamin--</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Nomor Telepon</label>
                            <div class="col-md-9">
                                <input class="form-control" id="no_telp" type="number" name="no_telp"
                                    placeholder="Masukkan nomor telepon">
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">Simpan Data</button>
                    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
