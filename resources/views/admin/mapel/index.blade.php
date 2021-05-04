@extends('layouts.app')
@section('title', 'Data Mapel')
@section('third_party_stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data Mapel</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('mapel.create') }}" class="btn btn-icon icon-left btn-primary shadow"><i
                        class="far fa-edit"></i>Tambah Data</a>
                <a href="{{ route('trash.mapel') }}" class="btn btn-icon icon-left btn-danger shadow"><i
                        class="fas fa-trash"></i>Recycle Bin</a>
            </div>

            <div class="col-md-2 mt-3">
                <select class="form-control shadow" id="jenis_mapel" type="text" name="jenis_mapel"
                    onchange="filterJenisMapel(this)">
                    <option value disable>Filter Jenis Mapel</option>
                    @foreach ($jenis_mapel as $item)
                        <option value="{{ $item->jenis_mapel }}">{{ $item->jenis_mapel }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mt-3">
                <select class="form-control shadow" id="jurusan_id" type="text" name="jurusan_id"
                    onchange="filterJurusan(this)">
                    <option value disable>Filter Jurusan</option>
                    @foreach (App\Models\Admin\Jurusan::all() as $jurusan)
                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card my-3">
                    <div class="card-body">
                        <table id="table" class="table table-striped table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Mapel</th>
                                    <th>Jenis Mapel</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_mapel as $mapel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mapel->kode_mapel }}</td>
                                        <td>{{ $mapel->jenis_mapel }}</td>
                                        <td>{{ $mapel->nama_mapel }}</td>
                                        <td><a href="">
                                                <form action="{{ route('mapel.destroy', [$mapel->id]) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('apakah anda yakin ingin menghapus Mata Pelajaran: {{ $mapel->nama_mapel }}')">Hapus</button>
                                                    <a href="{{route('show_mapel',$mapel->nama_mapel)}}" class="btn btn-info btn-sm">Lihat</a>
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
    </div>
@endsection

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

        function filterJenisMapel(el) {
            var value = (el.value || el.options[el.selectedIndex].value);
            window.location.href = '/mapel/jenismapel/' + value;
        }

        function filterJurusan(el) {
            var value = (el.value || el.options[el.selectedIndex].value);
            window.location.href = '/mapel/jurusan/' + value;
        }

    </script>
@endpush
