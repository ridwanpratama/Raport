@extends('layouts.app')
@section('title', 'Tambah Nilai UPD')
@section('pagetitle')
    <h1>Tambah Nilai UPD</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('upd.store') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Nama Siswa</label>
                        <div class="col-md-9">
                            <select class="form-control" id="siswa_id" name="siswa_id">
                                <option value="0">--Pilih Siswa--</option>
                                @foreach (App\Siswa::all() as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Pilih UPD</label>
                        <div class="col-md-9">
                            <select class="form-control" id="detail_upd_id" name="detail_upd_id">
                                <option value="0">--Pilih UPD--</option>
                                @foreach (App\Detail::all() as $upd_detail)
                                    <option value="{{ $upd_detail->id }}">{{ $upd_detail->nama_upd }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nilai UPD</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nilai_upd') is-invalid @enderror" id="nilai_upd" type="number" name="nilai_upd"
                                placeholder="@error('nilai_upd') {{ $message }} @enderror" value="{{ old('nilai_upd')}}">
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