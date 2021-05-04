@extends('layouts.app')
@section('title', 'Tambah Data Mapel')
@section('pagetitle')
    <h1>Tambah Data Mapel</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('mapel.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="jenis_mapel">Jenis Mapel</label>
                            <div class="col-md-9">
                                <select class="form-control @error('jenis_mapel') is-invalid @enderror" id="jenis_mapel" type="text" name="jenis_mapel"
                                placeholder="@error('jenis_mapel') {{ $message }} @enderror">
                                    <option value disable>Pilih Jenis Mapel</option>
                                    <option value="Muatan Nasional">Muatan Nasional</option>
                                    <option value="Muatan Kewilayahan">Muatan Kewilayahan</option>
                                    <option value="Muatan Peminatan Kejuruan">Muatan Peminatan Kejuruan</option>
                                    <option value="Dasar Program Keahlian">Dasar Program Keahlian</option>
                                    <option value="Kompetensi Keahlian">Kompetensi Keahlian</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="nama_mapel">Nama Mata Pelajaran</label>
                            <div class="col-md-9">
                                <input class="form-control  @error('nama_mapel') is-invalid @enderror" id="nama_mapel" type="text" name="nama_mapel"
                                placeholder="@error('nama_mapel') {{ $message }} @enderror">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="kelas">Tingkat</label>
                            <div class="col-md-9">
                                <select class="form-control @error('rombel_id') is-invalid @enderror" id="rombel_id" type="text" name="rombel_id"
                                placeholder="@error('rombel_id') {{ $message }} @enderror">
                                    <option value disable>Pilih Tingkat</option>
                                    @foreach (App\Models\Admin\Rombel::all() as $rombel)
                                        <option value="{{ $rombel->id }}">{{ $rombel->tingkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="jurusan_id">Jurusan</label>
                            <div class="col-md-9">
                                <select class="form-control @error('jurusan_id') is-invalid @enderror" id="jurusan_id" type="text" name="jurusan_id"
                                placeholder="@error('jurusan_id') {{ $message }} @enderror">
                                    <option value disable>Pilih Jurusan</option>
                                    @foreach (App\Models\Admin\Jurusan::all() as $jurusan)
                                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="guru_id">Guru</label>
                            <div class="col-md-9">
                                <select class="form-control @error('guru_id') is-invalid @enderror" id="guru_id" type="text" name="guru_id"
                                placeholder="@error('guru_id') {{ $message }} @enderror">
                                    <option value disable>Pilih Guru</option>
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
