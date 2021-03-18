@extends('layouts.app')
@section('title', 'Data Nilai')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
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
                    <th>#</th>
                    <th>NIS Siswa</th>
                    <th>Nama Siswa</th>
                    <th>Rombel</th>
                    <th>Rayon</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->nis }}</td>
                    <td>{{ $item->siswa->nama_siswa }}</td>
                    <td>{{ $item->siswa->rombel }}</td>
                    <td>{{ $item->rayon_id }}</td>
                    <td>{{ $item->jurusan_id }}</td>
                    <td>
                        <form action="{{route('nilai.destroy',[$item->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</button>
                            <a href="{{route('raport_show',$item->siswa_id)}}" class="btn btn-info btn-sm">Lihat</a>
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