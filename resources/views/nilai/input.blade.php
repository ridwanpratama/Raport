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
          <button class="btn btn-info" id="moreMapel">+</button>
          <button class="btn btn-danger" id="lessMapel">-</button>

          <div id="baseForm" class="mt-4">
            <select class="form-control my-2" id="mapelSelect" required>
              <option value disable>--Pilih Mapel--</option>
              @foreach (App\Mapel::all() as $mapel)
              <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
              @endforeach
            </select>

            <select id="nilaiSelect" class="form-control my-2" id="jenis_nilai" name="jenis_nilai[]" required>
              <option value disable>--Pilih Jenis Nilai--</option>
              <option value="uh1">UH 1</option>
              <option value="uh2">UH 2</option>
              <option value="pts_ganjil">PTS Ganjil</option>
              <option value="uh3">UH 3</option>
              <option value="uh4">UH 4</option>
              <option value="pas_ganjil">PAS Ganjil</option>
              <option value="uh5">UH 5</option>
              <option value="uh6">UH 6</option>
              <option value="pts_genap">PTS Genap</option>
              <option value="uh7">UH 7</option>
              <option value="uh8">UH 8</option>
              <option value="pat">PAT</option>
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
                    <input type="hidden" name="siswa_id[]" value="{{ $item->id }}"></td>
                    <input type="hidden" name="mapel_id[]" value=""></td>
                  <td>{{ $item->nis }}</td>
                  <td>{{ $item->rayon->nama_rayon }}</td>
                  <td><input class="form-control" data-tag="pengetahuanInput" type="text" name="nilai"></td>
                  <td><input class="form-control" data-tag="keterampilanInput" type="text" name="nilai"></td>
                </tr>
              </tbody>
              @endforeach

            </table>
          </div>

        </div>
        <div class="card-footer">
          <button class="btn btn-sm btn-primary" type="submit"> Simpan Data</button>
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
