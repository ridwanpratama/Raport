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
                                <label class="col-md-3 col-form-label" for="select1">Siswa</label>
                                <div class="col-md-12">
                                    <select class="form-control select" id="siswa_id" name="siswa_id">
                                        <option value="0">--Pilih Siswa--</option>
                                        @foreach (App\Siswa::all() as $siswa)
                                            <option value="{{ $siswa->id }}" data-rombel={{ $siswa->rombel }}
                                                data-rayon={{ $siswa->rayon->nama_rayon }}
                                                data-jurusan={{ $siswa->jurusan->nama_jurusan }}>{{ $siswa->nis }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <input class="form-control" id="rombel" type="text" name="rombel" placeholder="Rombel"
                                        readonly>
                                </div>

                                <div class="col-md-4">
                                    <input class="form-control" id="rayon" type="text" name="rayon_id" placeholder="Rayon"
                                        readonly>
                                </div>

                                <div class="col-md-4">
                                    <input class="form-control" id="jurusan" type="text" name="jurusan_id"
                                        placeholder="Jurusan" readonly>
                                </div>

                            </div>

                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th>Mapel</th>
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
                                        <th><a href="javascript:;'" class="btn btn-info addRow">+</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control" id="mapel_id" name="mapel_id[]">
                                                <option value="0">--Pilih Mapel--</option>
                                                @foreach (App\Mapel::all() as $mapel)
                                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="uh1[]" id="nilai" class="form-control" ></td>
                                        <td><input type="text" name="uh2[]" id="nilai" class="form-control" ></td>
                                        <td><input type="text" name="pts_ganjil[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="uh3[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="uh4[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="pas_ganjil[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="uh5[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="uh6[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="pts_genap[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="uh7[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="uh8[]" id="nilai" class="form-control"></td>
                                        <td><input type="text" name="pat[]" id="nilai" class="form-control"></td>
                                        <td><a href="javascript:;'" class="btn btn-danger deleteRow">-</a></td>
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
            $('thead').on('click', '.addRow', function() {
                var tr = '<tr>' +
                        '<td>' +
                            '<select class="form-control" id="mapel_id" name="mapel_id[]">'+
                                '<option value="0">--Pilih Mapel--</option>'+
                                ' @foreach (App\Mapel::all() as $mapel)'+
                                '<option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</td>'+
                        '<td><input type="text" name="uh1[]" id="nilai" class="form-control" ></td>' +
                        '<td><input type="text" name="uh2[]" id="nilai" class="form-control" ></td>'+
                        '<td><input type="text" name="pts_ganjil[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="uh3[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="uh4[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="pas_ganjil[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="uh5[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="uh6[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="pts_genap[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="uh7[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="uh8[]" id="nilai" class="form-control"></td>'+
                        '<td><input type="text" name="pat[]" id="nilai" class="form-control"></td>'+
                        '<td><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>' +
                    '</tr>';
    
            $('tbody').append(tr);
            });
    
            $('tbody').on('click', '.deleteRow', function(){
                $(this).parent().parent().remove();
            })
    
            $(document).ready(function(){
                $('.select').change(function(){                
                    let rombel = $(this).find(':selected').data('rombel');
                    let jurusan = $(this).find(':selected').data('jurusan');
                    let rayon = $(this).find(':selected').data('rayon');
    
                    $('#rombel').val(rombel)
                    $('#jurusan').val(jurusan)
                    $('#rayon').val(rayon)
                })
            });
    
        </script>
    @endpush