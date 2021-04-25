@extends('layouts.app')
@section('title', 'Edit Siswa')
@section('pagetitle')
    <h1>Edit Siswa</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{route('rombel.update',[$rombel->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Rombel</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nama_rombel') is-invalid @enderror" id="nama_rombel" type="text" name="nama_rombel"
                                placeholder="@error('nama_rombel') {{ $message }} @enderror" value="{{ $rombel->nama_rombel }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="jurusan_id">Guru</label>
                        <div class="col-md-9">
                            <select class="form-control" id="jurusan_id" name="jurusan_id">
                                <option value="{{ $rombel->jurusan_id }}">{{ $rombel->jurusan->nama_jurusan }}</option>
                                @foreach (App\Jurusan::all() as $jurusan)
                                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan Data</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection