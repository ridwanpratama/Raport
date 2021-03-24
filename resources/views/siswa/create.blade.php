@extends('layouts.app')
@section('title', 'Tambah Data Siswa')
@section('pagetitle')
    <h1>Tambah Data Siswa</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('siswa.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">NIS</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nis') is-invalid @enderror" id="nis" type="number" name="nis"
                                placeholder="@error('nis') {{ $message }} @enderror">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nama Siswa</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" type="text" name="nama_siswa"
                                placeholder="@error('nama_siswa') {{ $message }} @enderror" value="{{ old('nama_siswa') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Rombel</label>
                        <div class="col-md-9">
                            <select class="form-control @error('rombel_id') is-invalid @enderror" id="rombel_id" type="text" name="rombel_id"
                            placeholder="@error('rombel_id') {{ $message }} @enderror">
                                <option value disable>--Pilih Rombel--</option>
                                @foreach (App\Rombel::all() as $rombel)
                                    <option value="{{ $rombel->id }}">{{ $rombel->nama_rombel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Rayon</label>
                        <div class="col-md-9">
                            <select class="form-control @error('rayon_id') is-invalid @enderror" id="rayon_id" type="text" name="rayon_id"
                            placeholder="@error('rayon_id') {{ $message }} @enderror">
                                <option value disable>--Pilih Rayon--</option>
                                @foreach (App\Rayon::all() as $rayon)
                                    <option value="{{ $rayon->id }}">{{ $rayon->nama_rayon }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Jurusan</label>
                        <div class="col-md-9">
                            <select class="form-control @error('rayon_id') is-invalid @enderror" id="jurusan_id" type="text" name="jurusan_id"
                            placeholder="@error('rayon_id') {{ $message }} @enderror">
                                <option value="0">--Pilih Jurusan--</option>
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