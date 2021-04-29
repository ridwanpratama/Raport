@extends('layouts.app')
@section('title', 'Edit Tahun ajaran')
@section('pagetitle')
    <h1>Edit Tajun ajaran</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('tahun_ajaran.update', $tahun_ajaran->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tahun Ajaran</label>
                        <div class="col-md-9">
                            <input class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran" type="text" name="tahun_ajaran" value="{{ $tahun_ajaran->tahun_ajaran }}"
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
