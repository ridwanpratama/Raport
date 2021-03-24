@extends('layouts.app')
@section('title', 'Data Nilai')
@section('third_party_stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Pilih Rombel</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Rombel</h4>
                    </div>
                    <div class="card-body">
                      <a href="/tes2">RPL XII-1</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Rombel</h4>
                    </div>
                    <div class="card-body">
                      <a href="/tes2">RPL XII-2</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Rombel</h4>
                    </div>
                    <div class="card-body">
                      <a href="/tes2">RPL XII-3</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Rombel</h4>
                    </div>
                    <div class="card-body">
                      <a href="/tes2">RPL XII-4</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
@push('page_scripts')

@endpush
