@extends('layouts.app')
@section('title', 'Tambah Data UPD')
@section('pagetitle')
    <h1>Tambah Data UPD</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('detail.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Nama UPD</label>
                            <div class="col-md-9">
                                <input class="form-control" id="nama_upd" type="text" name="nama_upd"
                                    placeholder="Masukkan nama upd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="select1">Guru</label>
                            <div class="col-md-9">
                                <select class="form-control" id="guru_id" name="guru_id">
                                    <option value="0">--Pilih Guru--</option>
                                    @foreach (App\Models\Admin\Guru::all() as $guru)
                                        <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                                    @endforeach
                                </select>
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
