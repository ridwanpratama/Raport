@extends('layouts.app')
@section('title', 'Edit Nilai UPD')
@section('pagetitle')
    <h1>Edit Nilai UPD</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{route('upd.update',[$upd->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Siswa ID</label>
                        <div class="col-md-9">
                            <select class="form-control" id="siswa_id" name="siswa_id">
                                <option value="{{ $upd->siswa_id }}">{{ $upd->siswa->nama_siswa }}</option>
                                @foreach (App\Siswa::all() as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                   <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Nama Siswa</label>
                        <div class="col-md-9">
                            <select class="form-control" id="detail_upd_id" name="detail_upd_id">
                                <option value="{{ $upd->detail_upd_id }}">{{ $upd->detail->nama_upd }}</option>
                                @foreach (App\Detail::all() as $upd_detail)
                                    <option value="{{ $upd_detail->id }}">{{ $upd_detail->nama_upd }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nilai</label>
                        <div class="col-md-9">
                            <input class="form-control @error('nilai_upd') is-invalid @enderror" id="nilai_upd" type="number" name="nilai_upd"
                                placeholder="@error('nilai_upd') {{ $message }} @enderror" value="{{ $upd->nilai_upd }}">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="select1">Semester</label>
                      <div class="col-md-9">
                        <select id="semesterSelect" class="form-control my-2" name="semester" required>
                          <option value="{{ $upd->semester }}">{{ $upd->semester }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
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
