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
                <form class="form-horizontal" action="{{route('siswa.update',[$siswa->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">NIS</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nis') is-invalid @enderror" id="nis" type="number" name="nis"
                                placeholder="@error('nis') {{ $message }} @enderror" value="{{ $siswa->nis }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama Siswa</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" type="text" name="nama_siswa"
                                placeholder="@error('nama_siswa') {{ $message }} @enderror" value="{{ $siswa->nama_siswa }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Rombel</label>
                        <div class="col-md-9">
                            <select class="form-control" id="rombel_id" name="rombel_id">
                                <option value="{{ $siswa->rombel_id }}">{{ $siswa->rombel->nama_rombel }}</option>
                                @foreach (App\Models\Admin\Rombel::all() as $rombel)
                                    <option value="{{ $rombel->id }}">{{ $rombel->nama_rombel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Rayon</label>
                        <div class="col-md-9">
                            <select class="form-control" id="rayon_id" name="rayon_id">
                                <option value="{{ $siswa->rayon_id }}">{{ $siswa->rayon->nama_rayon }}</option>
                                @foreach (App\Models\Admin\Rayon::all() as $rayon)
                                    <option value="{{ $rayon->id }}">{{ $rayon->nama_rayon }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Jurusan</label>
                        <div class="col-md-9">
                            <select class="form-control" id="jurusan_id" name="jurusan_id">
                                <option value="{{ $siswa->jurusan_id }}">{{ $siswa->jurusan->nama_jurusan }}</option>
                                @foreach (App\Models\Admin\Jurusan::all() as $jurusan)
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
