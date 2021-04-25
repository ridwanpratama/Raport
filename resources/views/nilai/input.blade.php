@extends('layouts.app')

@section('title', 'Input Nilai')

@section('pagetitle')
<h1>Input Nilai</h1>
@endsection

@section('content')
<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('store_nilai') }}" method="POST">
          @csrf
          <div class="card-body" id="formsParent">
            
            {{-- <button class="btn btn-info" id="moreMapel">+</button>
            <button class="btn btn-danger" id="lessMapel">-</button> --}}

            <div id="baseForm" class="mt-4">
              <select class="form-control my-2" id="mapelSelect" required>
                <option value disable>Pilih Mapel</option>
                @foreach (App\Mapel::all() as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                @endforeach
              </select>

              <select id="jenisNilaiSelect" class="form-control my-2" required>
                <option value disable>Pilih Jenis Nilai</option>
                @foreach (App\JenisNilai::all() as $item)
                  <option value="{{ $item->id }}">{{ $item->jenis_nilai }}</option>
                @endforeach
              </select>

              <select id="semesterSelect" class="form-control my-2" required>
                <option value disable>Pilih Semester</option>
                  <option value="1">Semester 1</option>
                  <option value="2">Semester 2</option>
                  <option value="3">Semester 3</option>
                  <option value="4">Semester 4</option>
                  <option value="5">Semester 5</option>
              </select>

              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Rayon</th>
                    <th>Nilai Pengetahuan</th>
                    <th>Nilai Keterampilan</th>
                  </tr>
                </thead>

                @foreach ($siswa as $item)
                <tbody>
                  <tr>
                    <td>{{ $item->nama_siswa }}
                      <input type="hidden" name="siswa_id[]" value="{{ $item->id }}">
                      <input type="hidden" name="semester[]" value="placeholder">
                    </td>
                    <input type="hidden" name="mapel_id[]" value="placeholder"></td>
                    <input type="hidden" name="jenis_nilai_id[]" value="placeholder"></td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->rayon->nama_rayon }}</td>
                    <td><input class="form-control" type="number" name="nilai_pengetahuan[]"></td>
                    <td><input class="form-control" type="number" name="nilai_keterampilan[]"></td>
                  </tr>
                </tbody>
                @endforeach

              </table>
            </div>

          </div>
          <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('page_scripts')
<script src="/js/input.js"></script>
@endpush
