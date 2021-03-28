@extends('layouts.app')
@section('title', 'Data Raport')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@push('page_css')
    <style>
        .ddtf-processed th.option-except > select{
            display:none;
        }
        .ddtf-processed th.option-except > div{
            display:block !important;
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
          
           <div class="card my-3">
               <div class="card-body">
           <table id="table" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th class="option-except">#</th>
                    <th class="option-except">NIS Siswa</th>
                    <th class="option-except">Nama Siswa</th>
                    <th>Rombel</th>
                    <th>Rayon</th>
                    <th>Jurusan</th>
                    <th class="option-except">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->nis }}</td>
                    <td>{{ $item->siswa->nama_siswa }}</td>
                    <td>{{ $item->siswa->rombel->nama_rombel }}</td>
                    <td>{{ $item->siswa->rayon->nama_rayon }}</td>
                    <td>{{ $item->siswa->jurusan->nama_jurusan }}</td>
                    <td>
                        <a href="{{route('raport_show',$item->siswa_id)}}" class="btn btn-info btn-sm">Lihat</a>
                        </td>
                    </td>
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

@section('third_party_scripts')
<script type="text/javascript" charset="utf8" src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/ddtf.js') }}"></script>
@endsection
@push('page_scripts')
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
            $('#table').ddTableFilter();
        } );
    </script>
@endpush