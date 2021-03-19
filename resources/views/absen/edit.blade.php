@extends('layouts.app')
@section('title', 'Edit Absen')
@section('pagetitle')
    <h1>Edit Absen</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{route('absen.update',[$absen->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Siswa ID</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nis') is-invalid @enderror" id="nis" type="number" name="siswa_id" placeholder="@error('nis') {{ $message }} @enderror" value="{{ $absen->siswa_id }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Sakit</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" type="text" name="sakit" placeholder="@error('nama_siswa') {{ $message }} @enderror" value="{{ $absen->sakit }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Izin</label>
                        <div class="col-md-9">
                            <input class="form-control @error('rombel') is-invalid @enderror" id="rombel" type="text" name="izin" placeholder="@error('rombel') {{ $message }} @enderror" value="{{ $absen->izin }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Alpa</label>
                        <div class="col-md-9">
                            <input class="form-control @error('rombel') is-invalid @enderror" id="rombel" type="text" name="alpha" placeholder="@error('rombel') {{ $message }} @enderror" value="{{ $absen->alpha }}">
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