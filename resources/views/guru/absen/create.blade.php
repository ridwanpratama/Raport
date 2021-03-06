@extends('layouts.app')
@section('title', 'Tambah Data Absen')
@section('pagetitle')
    <h1>Tambah Data Absen</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('absen.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Siswa</label>
                        <div class="col-md-9">
                            <select class="form-control" id="siswa_id" name="siswa_id">
                                <option value="0">--Pilih Siswa--</option>
                                @foreach (App\Models\Admin\Siswa::all() as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Sakit</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" type="number" name="sakit" placeholder="@error('nama_siswa') {{ $message }} @enderror" value="{{ old('nama_siswa') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Izin</label>
                        <div class="col-md-9">
                            <input class="form-control @error('rombel') is-invalid @enderror" id="rombel" type="text" name="izin" placeholder="@error('rombel') {{ $message }} @enderror" value="{{ old('rombel') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Alpa</label>
                        <div class="col-md-9">
                            <input class="form-control @error('rombel') is-invalid @enderror" id="rombel" type="text" name="alpha" placeholder="@error('rombel') {{ $message }} @enderror" value="{{ old('rombel') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Pilih Jenis Absen</label>
                        <div class="col-md-9">
                            <select class="form-control" id="jenis_nilai_id" name="jenis_nilai_id">
                                <option value disable>--Pilih Jenis Absen--</option>
                                 @foreach (App\Models\Admin\JenisNilai::all() as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_nilai }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="select1">Semester</label>
                      <div class="col-md-9">
                        <select id="semesterSelect" class="form-control my-2" name="semester" required>
                          <option value disable>Pilih Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
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
