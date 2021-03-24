@extends('layouts.app')
@section('title', 'Data Rayon')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data Rayon</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <a href="{{ route('rayon.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Tambah Data</a>
           <a href="{{ route('trash.rayon') }}" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i>Recycle Bin</a>
           <div class="card my-3">
               <div class="card-body">
           <table id="table" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Rayon</th>
                    <th>Nama Guru Pembimbing</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rayons as $rayon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rayon->nama_rayon }}</td>
                    <td>{{ $rayon->guru->nama_guru }}</td>
                    <td><a href="">
                        <form action="{{route('rayon.destroy',[$rayon->id])}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus rayon: {{$rayon->nama_rayon}}')">Hapus</button>
                        <a href="{{route('rayon.edit',[$rayon->id])}}" class="btn btn-warning btn-sm">Ubah</a>
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
@endsection
@push('page_scripts')
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
@endpush
