@extends('layouts.app')
@section('title', 'Data Jurusan')
@section('third_party_stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Pilih Jurusan</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
          @foreach ($jurusan as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-wrap">
                    <div class="card-body p-4">
                      <a href="{{route('pilih_rombel',$item->id)}}">{{ $item->nama_jurusan }}</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
        </div>
    </div>
@endsection
@push('page_scripts')

@endpush
