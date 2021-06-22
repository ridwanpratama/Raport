@extends('layouts.app')
@section('title', 'Tambah Data KI KD')
@section('pagetitle')
    <h1>Tambah Data KI KD</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('kikd.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row" id="block">
                            <label class="col-md-3 col-form-label" for="jenis_kikd">Pilih Kompetensi</label>
                            <div class="col-md-9">
                                <select class="form-control" id=""
                                    type="text" name="jenis_kikd"
                                    placeholder="">
                                    <option value disable>Pilih Kompetensi</option>
                                    <option value="Kompetensi Inti">Kompetensi Inti</option>
                                    <option value="Kompetensi Dasar">Kompetensi Dasar</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="kompetensi">Kompetensi</label>
                          <div class="col-md-9">
                              <textarea name="kompetensi" id="kompetensi" cols="30" rows="20" class="form-control" placeholder="Masukkan Kompetensi"></textarea>
                          </div>
                      </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit"> Tambah Data</button>
                    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
