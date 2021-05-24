@extends('layouts.app')
@section('title', 'Data Upd')
@section('pagetitle')
    <h1>Nilai Upd</h1>
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
                                    <th>Nama Upd</th>
                                    <th>Nilai</th>
                                    <th>Jumlah Hadir</th>
                                    <th>Jumlah Tidak Hadir</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($upd as $item)
                                    <tr>
                                        <td>{{ $item->semester }}</td>
                                        <td>{{ $item->jenis_nilai->jenis_nilai }}</td>
                                        <td>{{ $item->detail->nama_upd }}</td>
                                        <td>{{ $item->nilai_upd }}</td>
                                        <td>{{ $item->jumlah_kehadiran }}</td>
                                        <td>{{ $item->jumlah_tidak_hadir }}</td>
                                        <td>
                                            <form action="{{ route('upd.destroy', [$item->id]) }}" method="post">
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
@foreach ($upd as $item)
<div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Upd</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('upd.update',$item->id) }}" method="post">
                    @csrf
                    @method('PUT')
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
                        <label for="detail_upd_id">Nama Upd</label>
                        <select class="form-control" id="detail_upd_id" type="text" name="detail_upd_id">
                            <option value="{{ $item->detail_upd_id }}">{{ $item->detail->nama_upd }}</option>
                            @foreach (App\Models\Admin\Detail::all() as $detail_upd)
                                <option value="{{ $detail_upd->id }}">{{ $detail_upd->nama_upd }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" class="form-control" id="nilai_upd" name="nilai_upd" value="{{ $item->nilai_upd }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kehadiran">Jumlah Hadir</label>
                        <input type="number" class="form-control" id="jumlah_kehadiran" name="jumlah_kehadiran" value="{{ $item->jumlah_kehadiran }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_tidak_hadir">Jumlah Tidak Hadir</label>
                        <input type="number" class="form-control" id="jumlah_tidak_hadir" name="jumlah_tidak_hadir" value="{{ $item->jumlah_tidak_hadir }}">
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
