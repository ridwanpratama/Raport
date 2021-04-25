@extends('layouts.app')
@section('title', 'Edit Jurusan')
@section('pagetitle')
    <h1>Edit Jurusan</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('jurusan.update', [$data_jurusan->id]) }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama jurusan</label>
                        <div class="col-md-9">
                            <input class="form-control" id="nama_jurusan" type="text" name="nama_jurusan"
                                value="{{ $data_jurusan->nama_jurusan }}" placeholder="Masukkan nama jurusan">
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit"> Edit Jurusan</button>
                <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection