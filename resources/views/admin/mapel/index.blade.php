@extends('layouts.app')
@section('title', 'Data Mapel')
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
    <h1>Data Mapel</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <a href="{{ route('mapel.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Tambah Data</a>
           <div class="card my-3">
               <div class="card-body">
           <table id="table" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th class="option-except">#</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th class="option-except">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_mapel as $mapel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mapel->nama_mapel }}</td>
                    <td>{{ $mapel->guru->nama_guru }}</td>
                    
                    <td><a href="">
                        <form action="{{ route('mapel.destroy', [$mapel->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('apakah anda yakin ingin menghapus Mata Pelajaran: {{ $mapel->nama_mapel }}')">Hapus</button>
                            <a href="{{ route('mapel.edit', [$mapel->id]) }}"
                                class="btn btn-warning btn-sm">Ubah</a>
                            </td>	
                        </form>
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