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
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Kompetensi Inti</label>
                            <div class="col-md-9">
                                <textarea name="ki" id="ki" cols="30" rows="20" class="form-control" placeholder="Masukkan Kompetensi Inti"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="text-input">Kompetensi Dasar</label>
                          <div class="col-md-9">
                              <textarea name="kd" id="kd" cols="30" rows="20" class="form-control" placeholder="Masukkan Kompetensi Dasar"></textarea>
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
