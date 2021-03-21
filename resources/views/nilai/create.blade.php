@extends('layouts.app')
@section('title', 'Tambah Nilai')
@section('pagetitle')
    <h1>Tambah Nilai</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('nilai.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Siswa</label>
                                <div class="col-md-12">
                                    <select class="form-control select @error('siswa_id') is-invalid @enderror" id="siswa_id" name="siswa_id" required>
                                        <option value disable>--Pilih Siswa--</option>
                                        @foreach (App\Siswa::all() as $siswa)
                                            <option value="{{ $siswa->id }}" data-rombel={{ $siswa->rombel }}
                                                data-rayon={{ $siswa->rayon->nama_rayon }}
                                                data-jurusan={{ $siswa->jurusan->nama_jurusan }} data-tingkat={{ $siswa->tingkat }} data-siswa={{ $siswa->nama_siswa }}>{{ $siswa->nis }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input class="form-control" id="nama_siswa" type="text" name="nama_siswa" placeholder="Nama siswa"
                                        readonly>
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control" id="tingkat" type="text" name="tingkat" placeholder="Tingkat"
                                        readonly>
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control" id="rombel" type="text" name="rombel" placeholder="Rombel"
                                        readonly>
                                </div>

                                <div class="col-md-2">
                                    <input class="form-control" id="rayon" type="text" name="rayon_id" placeholder="Rayon"
                                        readonly>
                                </div>

                                <div class="col-md-3">
                                    <input class="form-control @error('jurusan_id') is-invalid @enderror" id="jurusan" type="text" name="jurusan_id"
                                        placeholder="Jurusan" readonly>
                                </div>

                            </div>

                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th>UH 1</th>
                                        <th>UH 2</th>
                                        <th>PTS Ganjil</th>
                                        <th>UH 3</th>
                                        <th>UH 4</th>
                                        <th>PAS Ganjil</th>
                                        <th>UH 5</th>
                                        <th>UH 6</th>
                                        <th>PTS Genap</th>
                                        <th>UH 7</th>
                                        <th>UH 8</th>
                                        <th>PAT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="12">
                                            <select class="form-control my-2" id="mapel_id" name="mapel_id[]" required>
                                                <option value="0">--Pilih Mapel--</option>
                                                @foreach (App\Mapel::all() as $mapel)
                                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <th><a href="javascript:;" class="btn btn-info addRow mx-2">+</a></th>
                                        <th><a href="javascript:;" class="btn btn-danger deleteRow">-</a></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="uh1[]" class="form-control" placeholder="UH1" required></td>
                                        <td><input type="text" name="uh2[]" class="form-control" placeholder="UH2" required></td>
                                        <td><input type="text" name="pts_ganjil[]" class="form-control" placeholder="PTS1" required></td>
                                        <td><input type="text" name="uh3[]" class="form-control" placeholder="UH3" required></td>
                                        <td><input type="text" name="uh4[]" class="form-control" placeholder="UH4" required></td>
                                        <td><input type="text" name="pas_ganjil[]" class="form-control" placeholder="PAS1" required></td>
                                        <td><input type="text" name="uh5[]" class="form-control" placeholder="UH5" required></td>
                                        <td><input type="text" name="uh6[]" class="form-control" placeholder="UH6" required></td>
                                        <td><input type="text" name="pts_genap[]" class="form-control" placeholder="PTS2" required></td>
                                        <td><input type="text" name="uh7[]" class="form-control" placeholder="UH7" required></td>
                                        <td><input type="text" name="uh8[]" class="form-control" placeholder="UH8" required></td>
                                        <td><input type="text" name="pat[]" class="form-control" placeholder="PAT" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="uh1k[]" class="form-control" placeholder="UH1K" required></td>
                                        <td><input type="text" name="uh2k[]" class="form-control" placeholder="UH2K" required></td>
                                        <td><input type="text" name="pts_ganjilk[]" class="form-control" placeholder="PTS1K" required></td>
                                        <td><input type="text" name="uh3k[]" class="form-control" placeholder="UH3K" required></td>
                                        <td><input type="text" name="uh4k[]" class="form-control" placeholder="UH4K" required></td>
                                        <td><input type="text" name="pas_ganjilk[]" class="form-control" placeholder="PAS1K" required></td>
                                        <td><input type="text" name="uh5k[]" class="form-control" placeholder="UH5K" required></td>
                                        <td><input type="text" name="uh6k[]" class="form-control" placeholder="UH6K" required></td>
                                        <td><input type="text" name="pts_genapk[]" class="form-control" placeholder="PTS2K" required></td>
                                        <td><input type="text" name="uh7k[]" class="form-control" placeholder="UH7K" required></td>
                                        <td><input type="text" name="uh8k[]" class="form-control" placeholder="UH8K" required></td>
                                        <td><input type="text" name="patk[]" class="form-control" placeholder="PATK" required ></td>
                                    </tr>
                                </tbody>
                            </table>
                           
    
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Simpan Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('page_scripts')
        <script>
            $('tbody').on('click', '.addRow', function() {
                var tr = '<tr class="content">'+
                    '<td colspan="12">'+
                        '<select class="form-control my-2" id="mapel_id" name="mapel_id[]">'+
                            '<option value="0">--Pilih Mapel--</option>'+
                            '@foreach (App\Mapel::all() as $mapel)'+
                            '<option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>'+
                            '@endforeach'+
                            '</select>'+
                            '</td>'+
                            '</tr>'+
                            '<tr class="content">'+
                                '<td><input type="text" name="uh1[]" class="form-control" placeholder="UH1" required></td>'+
                                '<td><input type="text" name="uh2[]" class="form-control" placeholder="UH2" required></td>'+
                                '<td><input type="text" name="pts_ganjil[]" class="form-control" placeholder="PTS1" required></td>'+
                                '<td><input type="text" name="uh3[]" class="form-control" placeholder="UH3" required></td>'+
                                '<td><input type="text" name="uh4[]" class="form-control" placeholder="UH4" required></td>'+
                                '<td><input type="text" name="pas_ganjil[]" class="form-control" placeholder="PAS1" required></td>'+
                                '<td><input type="text" name="uh5[]" class="form-control" placeholder="UH5" required></td>'+
                                '<td><input type="text" name="uh6[]" class="form-control" placeholder="UH6" required></td>'+
                                '<td><input type="text" name="pts_genap[]" class="form-control" placeholder="PTS2" required></td>'+
                                '<td><input type="text" name="uh7[]" class="form-control" placeholder="UH7" required></td>'+
                                '<td><input type="text" name="uh8[]" class="form-control" placeholder="UH8" required></td>'+
                                '<td><input type="text" name="pat[]" class="form-control" placeholder="PAT" required></td>'+
                                '</tr>'+
                                '<tr class="content">'+
                                    '<td><input type="text" name="uh1k[]" class="form-control" placeholder="UH1K" required></td>'+
                                '<td><input type="text" name="uh2k[]" class="form-control" placeholder="UH2K" required></td>'+
                                '<td><input type="text" name="pts_ganjilk[]" class="form-control" placeholder="PTS1K" required></td>'+
                                '<td><input type="text" name="uh3k[]" class="form-control" placeholder="UH3K" required></td>'+
                                '<td><input type="text" name="uh4k[]" class="form-control" placeholder="UH4K" required></td>'+
                                '<td><input type="text" name="pas_ganjilk[]" class="form-control" placeholder="PAS1K" required></td>'+
                                '<td><input type="text" name="uh5k[]" class="form-control" placeholder="UH5K" required></td>'+
                                '<td><input type="text" name="uh6k[]" class="form-control" placeholder="UH6K" required></td>'+
                                '<td><input type="text" name="pts_genapk[]" class="form-control" placeholder="PTS2K" required></td>'+
                                '<td><input type="text" name="uh7k[]" class="form-control" placeholder="UH7K" required></td>'+
                                '<td><input type="text" name="uh8k[]" class="form-control" placeholder="UH8K" required></td>'+
                                '<td><input type="text" name="patk[]" class="form-control" placeholder="PATK" required></td>'+
                                    '</tr>';
    
            $('tbody').append(tr);
            });
    
            $('tbody').on('click', '.deleteRow', function(){
                $('.content:last').remove();
                $('.content:last').remove();
                $('.content:last').remove();
            })
    
            $(document).ready(function(){
                $('.select').change(function(){                
                    let rombel = $(this).find(':selected').data('rombel');
                    let siswa = $(this).find(':selected').data('siswa');
                    let jurusan = $(this).find(':selected').data('jurusan');
                    let rayon = $(this).find(':selected').data('rayon');
                    let tingkat = $(this).find(':selected').data('tingkat');
    
                    $('#nama_siswa').val(siswa)
                    $('#rombel').val(rombel)
                    $('#jurusan').val(jurusan)
                    $('#rayon').val(rayon)
                    $('#tingkat').val(tingkat)
                })
            });

        </script>
    @endpush