@extends('layouts.app')
@section('title', 'Data Nilai')
@section('third_party_stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data Nilai</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <input type="button" class="btn btn-icon icon-left btn-primary" onclick="printDiv('printableArea')"
                    value="Print!" />
                <div class="card my-3">
                    <div class="card-body" id="printableArea">
                        <table class="table table-sm" style="margin-bottom: 50px;">
                            <thead>
                                <tr>
                                    <th>Nama Siswa:</th>
                                    <th>NIS</th>
                                    <th>Rombel</th>
                                    <th>Rayon</th>
                                    <th>Jurusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->rombel->nama_rombel }}</td>
                                    <td>{{ $siswa->rayon->nama_rayon }}</td>
                                    <td>{{ $siswa->jurusan->nama_jurusan }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            @foreach ($nilai as $item)
                                <thead>
                                    <tr>
                                        <th>Mapel</th>
                                        <th>UH1</th>
                                        <th>UH2</th>
                                        <th>PTS Ganjil</th>
                                        <th>UH3</th>
                                        <th>UH4</th>
                                        <th>PAS Ganjil</th>
                                        <th>UH5</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td rowspan="7">{{ $item->mapel->nama_mapel }}, Predikat: {{ $item->ket }}</td>
                                    <td>{{ $item->uh1 }}</td>
                                    <td>{{ $item->uh2 }}</td>
                                    <td>{{ $item->pts_ganjil }}</td>
                                    <td>{{ $item->uh3 }}</td>
                                    <td>{{ $item->uh4 }}</td>
                                    <td>{{ $item->pas_ganjil }}</td>
                                    <td>{{ $item->uh6 }}</td>
                                </tr>
                                <tr>
                                    <th>UH6</th>
                                    <th>PTS Genap</th>
                                    <th>UH7</th>
                                    <th>UH8</th>
                                    <th>PAT</th>
                                    <th>Rata-rata</th>
                                    <th>Keterangan</th>
                                </tr>
                                <tr>
                                    <td>{{ $item->uh6 }}</td>
                                    <td>{{ $item->pts_genap }}</td>
                                    <td>{{ $item->uh7 }}</td>
                                    <td>{{ $item->uh8 }}</td>
                                    <td>{{ $item->pat }}</td>
                                    <td>{{ $item->rata_rata }}</td>
                                    <td>{{ $item->predikat }}</td>
                                </tr>
                                <tr>
                                    <th>UH1 K</th>
                                    <th>UH2 K</th>
                                    <th>PTS Ganjil K</th>
                                    <th>UH3 K</th>
                                    <th>UH4 K</th>
                                    <th>PAS Ganjil K</th>
                                    <th>UH5 K</th>
                                </tr>
                                <tr>
                                    <td>{{ $item->uh1k }}</td>
                                    <td>{{ $item->uh2k }}</td>
                                    <td>{{ $item->pts_ganjilk }}</td>
                                    <td>{{ $item->uh3k }}</td>
                                    <td>{{ $item->uh4k }}</td>
                                    <td>{{ $item->pas_ganjilk }}</td>
                                    <td>{{ $item->uh6k }}</td>
                                </tr>
                                <tr>
                                    <th>UH6 K</th>
                                    <th>PTS Genap K</th>
                                    <th>UH7 K</th>
                                    <th>UH8 K</th>
                                    <th>PAT K</th>
                                    <th>Rata-rata K</th>
                                    <th>Keterangan K</th>
                                </tr>
                                <tr>
                                    <td>{{ $item->uh6k }}</td>
                                    <td>{{ $item->pts_genapk }}</td>
                                    <td>{{ $item->uh7k }}</td>
                                    <td>{{ $item->uh8k }}</td>
                                    <td>{{ $item->patk }}</td>
                                    <td>{{ $item->rata_ratak }}</td>
                                    <td>{{ $item->predikatk }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <table class="table table-bordered" style="margin-top: 50px;">
                            <thead>
                                <tr>
                                    <th>Jumlah Absen</th>
                                    <th>Alpha</th>
                                    <th>Sakit</th>
                                    <th>Izin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $absen->alpha + $absen->sakit + $absen->izin }}</td>
                                    <td>{{ $absen->alpha }}</td>
                                    <td>{{ $absen->sakit }}</td>
                                    <td>{{ $absen->izin }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>UPD</th>
                                    <th>Nilai UPD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $upd->detail->nama_upd }}</td>
                                    <td>{{ $upd->nilai_upd }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script language="javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        document.getElementsByTagName("BODY")[0].onafterprint = function() {
            reload()
        };

        function reload() {
            window.location.reload();
        }

    </script>
@endpush
