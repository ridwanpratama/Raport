@extends('layouts.app')
@section('title', 'Data Siswa')
@section('third_party_stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data Siswa</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('siswa.create') }}" class="btn btn-icon icon-left btn-primary shadow"><i
                        class="far fa-edit"></i>Tambah Data</a>
                <a href="{{ route('trash.siswa') }}" class="btn btn-icon icon-left btn-danger shadow"><i
                        class="fas fa-trash"></i>Recycle Bin</a>
                <a href="{{ route('export_siswa') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-file-export"></i>Export Excel</a>
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#import"><i class="fas fa-file-import"></i>Import Excel</a>
            </div>

            <div class="col-md-2 mt-3">
                <select class="form-control shadow" id="jurusan_id" type="text" name="jurusan_id"
                    onchange="filterJurusan(this)">
                    <option value disable>Filter Jurusan</option>
                    @foreach ($data as $jurusan)
                        <option value="{{ $jurusan->jurusan->id }}">{{ $jurusan->jurusan->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mt-3">
                <select class="form-control shadow" id="rayon_id" type="text" name="rayon_id" onchange="filterRayon(this)">
                    <option value disable>Filter Rayon</option>
                    @foreach ($data as $rayon)
                        <option value="{{ $rayon->rayon->id }}">{{ $rayon->rayon->nama_rayon }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mt-3">
                <select class="form-control shadow" id="rombel_id" type="text" name="rombel_id"
                    onchange="filterRombel(this)">
                    <option value disable>Filter Rombel</option>
                    @foreach ($data as $rombel)
                        <option value="{{ $rombel->rombel->id }}">{{ $rombel->rombel->nama_rombel }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card my-3">
                    <div class="card-body">
                        <table id="table" class="table table-striped table-bordered table-md">
                            <thead>
                                <tr>
                                    <th class="option-except">#</th>
                                    <th class="option-except">NIS</th>
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
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->nama_siswa }}</td>
                                        <td>{{ $item->rombel->nama_rombel }}</td>
                                        <td>{{ $item->rayon->nama_rayon }}</td>
                                        <td>{{ $item->jurusan->nama_jurusan }}</td>
                                        <td>
                                            <form action="{{ route('siswa.destroy', [$item->id]) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus siswa: {{ $item->nama_siswa }} ? Data akan masuk ke recycle bin ')">Hapus</button>
                                                <a href="{{ route('siswa.edit', [$item->id]) }}"
                                                    class="btn btn-warning btn-sm">Ubah</a>
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
            <form action="{{ route('import_siswa') }}" method="POST" enctype="multipart/form-data">
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
    <script type="text/javascript" charset="utf8"
        src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}"></script>
@endsection
@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

        function filterJurusan(el) {
            var value = (el.value || el.options[el.selectedIndex].value);
            window.location.href = '/siswa/jurusan/' + value;
        }

        function filterRayon(el) {
            var value = (el.value || el.options[el.selectedIndex].value);
            window.location.href = '/siswa/rayon/' + value;
        }

        function filterRombel(el) {
            var value = (el.value || el.options[el.selectedIndex].value);
            window.location.href = '/siswa/rombel/' + value;
        }

    </script>
@endpush
