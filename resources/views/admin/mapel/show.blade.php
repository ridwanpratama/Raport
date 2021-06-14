@extends('layouts.app')
@section('title', 'Data Mapel')
@section('pagetitle')
    <h1>Data Mapel</h1>
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
                                    <th>Kode Mapel</th>
                                    <th>Jenis Mapel</th>
                                    <th>Nama Mapel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $identitas->kode_mapel }}</td>
                                    <td>{{ $identitas->jenis_mapel }}</td>
                                    <td>{{ $identitas->nama_mapel }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table id="table" class="table table-striped table-bordered table-md">
                            <thead>
                                <tr>
                                    <th>Jurusan</th>
                                    <th>Tingkat</th>
                                    <th>Guru</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mapel as $item)
                                    <tr>
                                        <td>{{ $item->jurusan->nama_jurusan }}</td>
                                        <td>{{ $item->rombel->tingkat }}</td>
                                        <td>{{ $item->guru->nama_guru }}</td>
                                        <td>
                                            <form action="{{ route('mapel.destroy', [$item->id]) }}" method="post">
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
@foreach ($mapel as $item)
<div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mapel.update',$item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="mapel">Jurusan</label>
                        <select class="form-control" id="jurusan_id" type="text" name="jurusan_id">
                            <option value="{{ $item->jurusan_id }}">{{ $item->jurusan->nama_jurusan }}</option>
                            @foreach (App\Models\Admin\Jurusan::all() as $jurusan)
                                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rombel_id">Tingkat</label>
                        <select class="form-control" id="rombel_id" type="text" name="rombel_id">
                            <option value="{{ $item->rombel_id }}">{{ $item->rombel->tingkat }}</option>
                            @foreach (App\Models\Admin\Rombel::all() as $rombel)
                                <option value="{{ $rombel->id }}">{{ $rombel->tingkat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="guru_id">Guru</label>
                        <select class="form-control" id="guru_id" type="text" name="guru_id">
                        <option value="{{ $item->guru_id }}">{{ $item->guru->nama_guru }}</option>
                        @foreach (App\Models\Admin\Guru::all() as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                        @endforeach
                    </select>
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
