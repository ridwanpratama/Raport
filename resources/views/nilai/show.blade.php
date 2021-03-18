@extends('layouts.app')
@section('title', 'Data Nilai')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data Nilai</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          
           <div class="card my-3">
            <div class="card-body">
                {{-- <p>Detail nilai dari siswa {{ $nilai->siswa->nama_siswa }}</p> --}}
                <p>Nilai UPD: {{ $upd->nilai_upd }}</p>
                <p>Jumlah Sakit: {{ $absen->sakit }}</p>
                <p>Jumlah izin: {{ $absen->izin }}</p>
                <p>Jumlah alpha: {{ $absen->alpha }}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Mapel</th>
                            <th>UH1</th>
                            <th>UH2</th>
                            <th>PTS Ganjil</th>
                            <th>UH3</th>
                            <th>UH4</th>
                            <th>PAS Ganjil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $item)
                        <tr>
                            <td>{{ $item->siswa->nama_siswa }}</td>
                            <td>{{ $item->mapel->nama_mapel }}</td>
                            <td>{{ $item->uh1 }}</td>
                            <td>{{ $item->uh2 }}</td>
                            <td>{{ $item->pts_ganjil }}</td>
                            <td>{{ $item->uh3 }}</td>
                            <td>{{ $item->uh4 }}</td>
                            <td>{{ $item->pas_ganjil }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           </div>
        </div>
    </div>
</div>
@endsection