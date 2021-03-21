@extends('layouts.app')
@section('title', 'Data Siswa')
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
    <h1>Data Siswa</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <a href="{{ route('siswa.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Tambah Data</a>
           <a href="{{ route('trash.siswa') }}" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i>Recycle Bin</a>
           <div class="card my-3">
               <div class="card-body">
           <table id="table" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th class="option-except">#</th>
                    <th class="option-except">NIS</th>
                    <th class="option-except">Nama Siswa</th>
                    <th>Tingkat</th>
                    <th>Rombel</th>
                    <th>Rayon</th>
                    <th>Jurusan</th>
                    <th class="option-except">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->tingkat }}</td>
                    <td>{{ $item->rombel }}</td>
                    <td>{{ $item->rayon->nama_rayon }}</td>
                    <td>{{ $item->jurusan->nama_jurusan }}</td>
                    <td>
                        <form action="{{route('siswa.destroy',[$item->id])}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus siswa: {{$item->nama_siswa}} ? Data akan masuk ke recycle bin ')">Hapus</button>
                            <a href="{{route('siswa.edit',[$item->id])}}" class="btn btn-warning btn-sm">Ubah</a>
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