@extends('layouts.app')
@section('title', 'Data Raport')
@section('third_party_stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@push('page_css')
    <style>
        .ddtf-processed th.option-except>select {
            display: none;
        }

        .ddtf-processed th.option-except>div {
            display: block !important;
        }

        select {
            border: none;
            background-color: transparent;
        }

    </style>
@endpush
@section('pagetitle')
    <h1>Data Raport</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="/raport/search" method="GET">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <input type="date" class="form-control mb-3 shadow-sm"
                                name="startDate" id="startDate">
                        </div>
                        <div class="col-auto">
                            <label class="col-sm-2 mb-3"><b>-</b></label>
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control mb-3 shadow-sm"
                                name="endDate" id="endDate">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Cari</button>
                        </div>
                    </div>
                    
                        <div class="card my-3">
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th class="option-except">#</th>
                                            <th class="option-except">NIS Siswa</th>
                                            <th class="option-except">Nama Siswa</th>
                                            <th>Rayon</th>
                                            <th>Jurusan</th>
                                            <th class="option-except">Semester</th>
                                            @isset($data)
                                            <th class="option-except">Tengah Semester</th>
                                            @endif
                                            @isset($nilai)
                                            <th class="option-except">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($data)
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->siswa->nis }}</td>
                                                    <td>{{ $item->siswa->nama_siswa }}</td>
                                                    <td>{{ $item->siswa->rayon->nama_rayon }}</td>
                                                    <td>{{ $item->siswa->jurusan->nama_jurusan }}</td>
                                                    <td>
                                                        <a href="{{ route('raport1_show', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm">1</a>
                                                        <a href="{{ route('raport2_show', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm">2</a>
                                                        <a href="{{ route('raport3_show', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm">3</a><br>
                                                        <a href="{{ route('raport4_show', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm mt-1">4</a>
                                                        <a href="{{ route('raport5_show', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm mt-1">5</a>
                                                        <a href="{{ route('raport5_show', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm mt-1">6</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('mid1', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm">Mid 1</a>
                                                        <a href="{{ route('mid2', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm">Mid 2</a>
                                                        <a href="{{ route('mid3', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm">Mid 3</a><br>
                                                        <a href="{{ route('mid4', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm mt-1">Mid 4</a>
                                                        <a href="{{ route('mid5', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm mt-1"> Mid 5</a>
                                                        <a href="{{ route('mid6', $item->siswa_id) }}"
                                                            class="btn btn-info btn-sm mt-1"> Mid 6</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif

                                            @isset($nilai)
                                            @foreach ($nilai as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->siswa->nis }}</td>
                                                    <td>{{ $item->siswa->nama_siswa }}</td>
                                                    <td>{{ $item->siswa->rayon->nama_rayon }}</td>
                                                    <td>{{ $item->siswa->jurusan->nama_jurusan }}</td>
                                                    <td>{{ $item->semester }}</td>
                                                    <td>
                                                        <a href=""
                                                            class="btn btn-info btn-sm">Show</a>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        @endsection

        @section('third_party_scripts')
            <script type="text/javascript" charset="utf8"
                src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/js/ddtf.js') }}"></script>
        @endsection
        @push('page_scripts')
            <script>
                $(document).ready(function() {
                    $('#table').DataTable();
                    $('#table').ddTableFilter();
                });

            </script>
        @endpush
