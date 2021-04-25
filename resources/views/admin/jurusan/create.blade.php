@extends('layouts.app')
@section('title', 'Tambah Data Jurusan')
@section('pagetitle')
    <h1>Tambah Data Jurusan</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('jurusan.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Nama Jurusan</label>
                            <div class="col-md-9">
                                <input class="form-control" id="nama_jurusan" type="text" name="nama_jurusan"
                                    placeholder="Masukkan nama jurusan">
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit"> Tambah Jurusan</button>
                    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection