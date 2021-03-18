@extends('layouts.app')
@section('title', 'Data Jurusan')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data Jurusan</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <a href="{{ route('jurusan.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Tambah Data</a>
           <div class="card my-3">
               <div class="card-body">
           <table id="table" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <?php $i=1; ?>
                        @foreach($data_jurusan as $jurusan)
                        <td>{{ $i++ }}</td>
                        <td>{{ $jurusan->nama_jurusan }}</td>
                        <td><a href="">
              <form action="{{route('jurusan.destroy',[$jurusan->id])}}" method="post">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data jurusan: {{$jurusan->nama_jurusan}} ')">Hapus</button>
                  <a href="{{route('jurusan.edit',[$jurusan->id])}}" class="btn btn-warning btn-sm">Ubah</a>
              </td>
                  
              </form>
                        
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