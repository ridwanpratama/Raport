@extends('layouts.app')
@section('title', 'Data User')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data User</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <a href="{{ route('restore.user') }}" class="btn btn-icon icon-left btn-success" onclick="return confirm('Apakah anda yakin ingin merestore semua data?')"><i class="far fa-edit"></i>Restore All</a>
           <a href="{{ route('deleteall.user') }}" class="btn btn-icon icon-left btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus permanen semua data?')"><i class="fas fa-trash"></i>Delete All</a>
           <div class="card my-3">
               <div class="card-body">
           <table id="table" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->level }}</td>
                    <td>
                        <a href="{{route('delete.user',[$item->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus permanen user: {{$item->name}}?')">Delete</a>
                        <a href="{{route('trashuser.restore',[$item->id])}}" class="btn btn-success btn-sm">Restore</a>
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
