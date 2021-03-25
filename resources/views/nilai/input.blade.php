@extends('layouts.app')
@section('title', 'Input Nilai')
@section('pagetitle')
    <h1>Input Nilai</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card my-3">
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="POST">
                            @csrf
                            <select class="form-control my-2" id="mapel_id" name="mapel_id[]" required>
                                <option value disable>--Pilih Mapel--</option>
                                @foreach (App\Mapel::all() as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                @endforeach
                            </select>

                            <select id="Type" class="form-control my-2" id="jenis_nilai" name="jenis_nilai[]" required>
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

                            <table class="table table-sm"">
                            @foreach ($siswa as $item)
                                <thead>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>NIS</th>
                                        <th>Rayon</th>
                                        <th>Nilai Pengetahuan</th>
                                        <th>Nilai Keterampilan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" value="{{ $item->nama_siswa }}" readonly></td>
                                        <td><input type="text" value="{{ $item->nis }}" readonly></td>
                                        <td><input type="text" value="{{ $item->rayon->nama_rayon }}" readonly></td>
                                        <td><input id="Value" type="text" name="nilai"></td>
                                        <td><input id="Values" type="text" name="nilai"></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Simpan Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        document.getElementById('Type').addEventListener('change', function(evt) {
            var type = this.selectedOptions[0].value;
            document.getElementById('Value').setAttribute('name', `${type}[]`);
            document.getElementById('Values').setAttribute('name', `${type}k[]`);
        });
    </script>
@endpush
