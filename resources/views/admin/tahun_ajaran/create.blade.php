@extends('layouts.app')
@section('title', 'Tambah Tahun ajaran')
@section('pagetitle')
    <h1>Tambah Tajun ajaran</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('tahun_ajaran.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tahun Ajaran</label>
                        <div class="col-md-9">
                            <input class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" type="text" name="tahun_ajaran"
                                placeholder="@error('tahun_ajaran') {{ $message }} @enderror">
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
