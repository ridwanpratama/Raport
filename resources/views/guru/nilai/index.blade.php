@extends('layouts.app')
@section('title', 'Data Nilai')
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
    <h1>Data Nilai</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('export_nilai') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-file-export"></i>Export Excel</a>
            <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#import"><i class="fas fa-file-import"></i>Import Excel</a>
           <div class="card my-3">
               <div class="card-body">
           <table id="table" class="table table-striped table-bordered table-md">
            <thead>
                <tr>
                    <th>#</th>
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
                        <form action="{{route('nilai.destroy',[$item->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</button>
                            <a href="{{route('nilai_show',[$item->siswa_id,$item->tahun_ajaran_id])}}" class="btn btn-info btn-sm">Lihat</a>
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
@push('modal')
    <!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('import_nilai') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endpush

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