@extends('layouts.app')
@section('title', 'Tambah Rombel')
@section('pagetitle')
    <h1>Tambah Rombel</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('rombel.store') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Rombel</label>
                        <div class="col-md-9">
                            <input class="form-control @error('rombel') is-invalid @enderror" id="nama_rombel" type="text" name="nama_rombel"
                                placeholder="@error('rombel') {{ $message }} @enderror">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Jurusan</label>
                        <div class="col-md-9">
                            <select class="form-control @error('jurusan_id') is-invalid @enderror" type="text" name="jurusan_id"
                            placeholder="@error('jurusan_id') {{ $message }} @enderror">
                                <option value disable>--Pilih Jurusan--</option>
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