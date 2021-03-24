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
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <select class="form-control my-2" id="mapel_id" name="mapel_id[]" required>
                        <option value="0">--Pilih Mapel--</option>
                    </select>

                    <select class="form-control my-2" id="mapel_id" name="mapel_id[]" required>
                        <option value="0">--Pilih Jenis Nilai--</option>
                    </select>

                    <table class="table table-sm" style="margin-bottom: 50px;">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>Rayon</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama Siswa</td>
                                <td>NIS</td>
                                <td>Rayon</td>
                                <td><input type="text"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')

@endpush
