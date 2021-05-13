@extends('layouts.app')

@section('title', 'Input Absen')

@section('pagetitle')
<h1>Input Absen</h1>
@endsection

@section('content')
<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <form action="{{ route('store_absen') }}" method="POST">
          @csrf
          <div class="card-body" id="formsParent">

            <button type="button" class="btn btn-info" id="moreMapel">+</button>
            <button type="button" class="btn btn-danger" id="lessMapel">-</button>

            <div id="baseForm" class="mt-4">
              <select id="jenisNilaiSelect" class="form-control my-2" required>
                <option value disable>Pilih Jenis Nilai</option>
                @foreach ($jenis_nilai as $item)
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
                <option value="6">Semester 6</option>
              </select>

              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Nama Siswa</th>
                    <th>NIS</th>
                    <th>Rayon</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alpha</th>
                  </tr>
                </thead>

                @foreach ($siswa as $item)
                <tbody>
                  <tr>
                    <td>{{ $item->nama_siswa }}
                      <input type="hidden" name="siswa_id[]" value="{{ $item->id }}">
                      <input type="hidden" name="semester[]" value="placeholder">
                    </td>
                    <input type="hidden" name="jenis_nilai_id[]" value="placeholder"></td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->rayon->nama_rayon }}</td>
                    <td><input class="form-control" type="number" name="sakit[]"></td>
                    <td><input class="form-control" type="number" name="izin[]"></td>
                    <td><input class="form-control" type="number" name="alpha[]"></td>
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

{{-- @push('page_scripts')
<script src="/js/input.js"></script>
@endpush --}}
