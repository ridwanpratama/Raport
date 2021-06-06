@extends('layouts.app')
@section('title', 'Edit KI KD')
@section('pagetitle')
    <h1>Edit KI KD</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                <form class="form-horizontal" action="{{ route('kikd.update', [$data_kikd->id]) }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Kompetensi Inti</label>
                        <div class="col-md-9">
                          <textarea name="ki" id="ki" cols="30" rows="20" class="form-control" placeholder="Masukkan Kompetensi Inti">{{ $data_kikd->ki }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="text-input">Kompetensi Dasar</label>
                      <div class="col-md-9">
                        <textarea name="kd" id="kd" cols="30" rows="20" class="form-control" placeholder="Masukkan Kompetensi Dasar">{{ $data_kikd->kd }}</textarea>
                      </div>
                  </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit"> Edit Data</button>
                <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
