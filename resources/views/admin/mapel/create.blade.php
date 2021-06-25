@extends('layouts.app')
@section('title', 'Tambah Data Mapel')
@section('pagetitle')
    <h1>Tambah Data Mapel</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('mapel.store') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{-- <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="kode_mapel">Kode Mapel</label>
                                <div class="col-md-9">

                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="jenis_mapel">Jenis Mapel</label>
                                <div class="col-md-9">
                                    <select class="form-control @error('jenis_mapel') is-invalid @enderror" id="jenis_mapel"
                                        type="text" name="jenis_mapel"
                                        placeholder="@error('jenis_mapel') {{ $message }} @enderror">
                                        <option value disable>Pilih Jenis Mapel</option>
                                        <option value="Muatan Nasional">Muatan Nasional</option>
                                        <option value="Muatan Kewilayahan">Muatan Kewilayahan</option>
                                        <option value="Muatan Peminatan Kejuruan">Muatan Peminatan Kejuruan</option>
                                        <option value="Dasar Program Keahlian">Dasar Program Keahlian</option>
                                        <option value="Kompetensi Keahlian">Kompetensi Keahlian</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="nama_mapel">Nama Mata Pelajaran</label>
                                <div class="col-md-9" id="mapelContainer">

                                    <a href="#" class="btn btn-primary" onclick="newMapel()" id="newMapel">Mapel baru</a>
                                    <a href="#" class="btn btn-info" onclick="oldMapel()" id="oldMapel">Mapel yang sudah
                                        ada</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="kelas">Tingkat</label>
                                <div class="col-md-9">
                                    <select class="form-control @error('rombel_id') is-invalid @enderror" id="rombel_id"
                                        type="text" name="rombel_id"
                                        placeholder="@error('rombel_id') {{ $message }} @enderror">
                                        <option value disable>Pilih Tingkat</option>
                                        @foreach (App\Models\Admin\Rombel::all() as $rombel)
                                            <option value="{{ $rombel->id }}">{{ $rombel->tingkat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="jurusan_id">Jurusan</label>
                                <div class="col-md-9">
                                    <select class="form-control @error('jurusan_id') is-invalid @enderror" id="jurusan_id"
                                        type="text" name="jurusan_id"
                                        placeholder="@error('jurusan_id') {{ $message }} @enderror">
                                        <option value disable>Pilih Jurusan</option>
                                        @foreach (App\Models\Admin\Jurusan::all() as $jurusan)
                                            <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="guru_id">Guru</label>
                                <div class="col-md-9">
                                    <select class="form-control @error('guru_id') is-invalid @enderror" id="guru_id"
                                        type="text" name="guru_id"
                                        placeholder="@error('guru_id') {{ $message }} @enderror">
                                        <option value disable>Pilih Guru</option>
                                        @foreach (App\Models\Admin\Guru::all() as $guru)
                                            <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <button type="button" class="btn btn-info mb-2" id="add"><b>+</b> KI/KD</button>

                            <div class="form-group row" id="block">
                              <label class="col-md-3 col-form-label" for="ki_kd_id">Kompetensi Inti</label>
                              <div class="col-md-9">
                                  <select class="form-control @error('ki_kd_id') is-invalid @enderror" id="ki_kd_id"
                                      type="text" name="ki_kd_id[]"
                                      placeholder="@error('ki_kd_id') {{ $message }} @enderror">
                                      <option value disable>Pilih Kompetensi Inti</option>
                                      @foreach ($komp_inti as $ki)
                                          <option value="{{ $ki->id }}">{{ $ki->kompetensi }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>

                          <div class="form-group row" id="block">
                            <label class="col-md-3 col-form-label" for="ki_kd_id">Kompetensi Dasar</label>
                            <div class="col-md-9">
                                <select class="form-control" id=""
                                    type="text" name="kd">
                                    <option value disable>Pilih Kompetensi Dasar</option>
                                    @foreach ($komp_dasar as $kd)
                                        <option value="{{ $kd->kompetensi }}">{{ $kd->kompetensi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">Simpan Data</button>
                        <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        function newMapel() {
            let mapel =
                `<input class="form-control  @error('nama_mapel') is-invalid @enderror" id="nama_mapel" type="text" name="nama_mapel"` +
                `placeholder="Nama Mapel">`+
                `<input class="form-control mt-2" id="kode_mapel" type="text" name="kode_mapel" placeholder="Kode Mapel">`;

            $("#newMapel").css("display", "none");
            $("#oldMapel").css("display", "none");

            $("#mapelContainer").append(mapel);
        }

        function oldMapel() {
            let mapel =
            `<select class="form-control" id="nama_mapel"type="text" name="nama_mapel">`+
                `<option value disable>Pilih Mapel</option>`+
                `@foreach ($data_mapel as $item)` +
                    `<option value="{{ $item->nama_mapel }}" data-mapel={{ $item->kode_mapel }}>{{ $item->nama_mapel }}</option>`+
                `@endforeach` +
            `</select>`+
            `<input class="form-control mt-2" id="kode_mapel" type="text" name="kode_mapel" placeholder="Kode Mapel" readonly>`;

            $("#newMapel").css("display", "none");
            $("#oldMapel").css("display", "none");
            $("#mapelContainer").append(mapel);

            $(document).ready(function(){
                $('#nama_mapel').change(function(){
                    let mapel = $(this).find(':selected').data('mapel');
                    $('#kode_mapel').val(mapel)
                })
            });
        }

        $('#add').click(function () {
        $('#block:last').before('<div class="form-group row" id="block">' +
                              '<label class="col-md-3 col-form-label" for="ki_kd_id">Kompetensi Inti</label>' +
                              '<div class="col-md-9">' +
                                  '<select class="form-control" id="ki_kd_id"' +
                                  'type="text" name="ki_kd_id[]"' +
                                  'placeholder="">' +
                                  '<option value disable>Pilih Kompetensi Inti</option>' +
                                  '@foreach ($komp_inti as $ki)' +
                                    '<option value="{{ $ki->id }}">{{ $ki->kompetensi }}</option>' +
                                  '@endforeach' +
                                  '</select>' +
                                  '</div>' +
                                  '</div>'+
                            '<div class="form-group row" id="block">' +
                            '<label class="col-md-3 col-form-label" for="guru_id">Kompetensi Dasar</label>'+
                            '<div class="col-md-9">'+
                                '<select class="form-control" id=""'+
                                    'type="text" name="kd"'+
                                   ' placeholder="">'+
                                    '<option value disable>Pilih Kompetensi Dasar</option>'+
                                    '@foreach ($komp_dasar as $kd)'+
                                        '<option value="{{ $kd->kompetensi }}">{{ $kd->kompetensi }}</option>'+
                                   ' @endforeach'+
                                '</select>'+
                            '</div>'+
                        '</div>');
        });

    </script>
@endpush
