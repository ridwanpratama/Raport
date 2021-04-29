@extends('layouts.app')
@section('title', 'Dashboard')
@section('pagetitle')
    <h1>Dashboard</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah User</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_user }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Siswa</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_siswa }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-address-card"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Guru</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_guru }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-book"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Mapel</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_mapel }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fas fa-home"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Rayon</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_rayon }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-secondary">
              <i class="fas fa-volleyball-ball"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah UPD</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_upd }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-dark">
              <i class="fas fa-university"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Jurusan</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_jurusan }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-light">
              <i class="fas fa-balance-scale"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Rata<sup>2</sup> KKM</h4>
              </div>
              <div class="card-body">
                75
              </div>
            </div>
          </div>
        </div>
      </div>


</div>
@endsection

@push('page-scripts')

@endpush
