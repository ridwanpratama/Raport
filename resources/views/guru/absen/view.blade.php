@extends('layouts.app')
@section('title', 'Data Absen')
@section('pagetitle')
    <h1>Data Absen</h1>
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
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Rombel</th>
                                    <th>Jurusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td>{{ $siswa->rombel->nama_rombel }}</td>
                                    <td>{{ $siswa->jurusan->nama_jurusan }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table id="table" class="table table-striped table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>Jenis Nilai</th>
                                    <th>Sakit</th>
                                    <th>Izin</th>
                                    <th>Alpha</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absen as $item)
                                    <tr>
                                        <td>Semester {{ $item->semester }}</td>
                                        <td>{{ $item->jenis_nilai->jenis_nilai }}</td>
                                        <td>{{ $item->sakit }}</td>
                                        <td>{{ $item->izin }}</td>
                                        <td>{{ $item->alpha }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>
                                            <form action="{{ route('absen.destroy', [$item->id]) }}" method="post">
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
@foreach ($absen as $item)
<div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('absen.update',$item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" class="form-control" id="semester" name="semester" value="{{ $item->semester }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_nilai_id">Jenis Nilai</label>
                        <select class="form-control" id="jenis_nilai_id" type="text" name="jenis_nilai_id">
                            <option value="{{ $item->jenis_nilai_id }}">{{ $item->jenis_nilai->jenis_nilai }}</option>
                            @foreach (App\Models\Admin\JenisNilai::all() as $jenis_nilai)
                                <option value="{{ $jenis_nilai->id }}">{{ $jenis_nilai->jenis_nilai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sakit">Sakit</label>
                        <input type="number" class="form-control" id="sakit" name="sakit" value="{{ $item->sakit }}">
                    </div>
                    <div class="form-group">
                        <label for="izin">Izin</label>
                        <input type="number" class="form-control" id="izin" name="izin" value="{{ $item->izin }}">
                    </div>
                    <div class="form-group">
                        <label for="alpha">Alpha</label>
                        <input type="number" class="form-control" id="alpha" name="alpha" value="{{ $item->alpha }}">
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

@endpush
