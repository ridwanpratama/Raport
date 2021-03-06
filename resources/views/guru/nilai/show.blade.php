@extends('layouts.app')
@section('title', 'Data Nilai')
@section('pagetitle')
    <h1>Data Nilai</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                
                <div class="card my-3">
                    <div class="card-body">

                        <table class="table table-sm" style="margin-bottom: 50px;">
                            <thead>
                                <tr>
                                    <th>Nama Siswa:</th>
                                    <th>NIS</th>
                                    <th>Rombel</th>
                                    <th>Rayon</th>
                                    <th>Jurusan</th>
                                    <th>Tahun Ajaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->rombel->nama_rombel }}</td>
                                    <td>{{ $siswa->rayon->nama_rayon }}</td>
                                    <td>{{ $siswa->jurusan->nama_jurusan }}</td>
                                    <td>{{ $tahun_ajaran->tahun_ajaran }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table id="table" class="table table-striped table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mapel</th>
                                    <th>Jenis Nilai</th>
                                    <th>Pengetahuan</th>
                                    <th>Keterampilan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->mapel->nama_mapel }}</td>
                                        <td>{{ $item->jenis_nilai->jenis_nilai }}</td>
                                        <td>{{ $item->nilai_pengetahuan }}</td>
                                        <td>{{ $item->nilai_keterampilan }}</td>
                                        <td>
                                            <form action="{{ route('nilai.destroy', [$item->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</button>
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#editModal-{{ $item->id }}">Ubah</a>
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
    @foreach ($nilai as $item)
        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('nilai.update', $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="mapel">Mata Pelajaran</label>
                                <input type="text" class="form-control" id="mapel" name="mapel" readonly
                                    value="{{ $item->mapel->nama_mapel }}">
                            </div>
                            <div class="form-group">
                                <label for="nilai_pengetahuan">Nilai Pengetahuan</label>
                                <input type="text" class="form-control" id="mapel" name="nilai_pengetahuan"
                                    value="{{ $item->nilai_pengetahuan }}">
                            </div>
                            <div class="form-group">
                                <label for="nilai_keterampilan">Nilai Keterampilan</label>
                                <input type="text" class="form-control" id="nilai_keterampilan" name="nilai_keterampilan"
                                    value="{{ $item->nilai_keterampilan }}">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endpush
@push('page_scripts')
    <script>


    </script>
@endpush
