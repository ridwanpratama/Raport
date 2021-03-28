@extends('layouts.app')
@section('title', 'Data Raport')
@section('third_party_stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data Raport</h1>
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
                            <thead>
                                <tr>
                                    <th>Mapel</th>
                                    <th>KKM</th>
                                    <th>Nilai Pengetahuan</th>
                                    <th>Nilai Keterampilan</th>
                                    <th>Predikat</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $item)
                                    <tr>
                                        <td>{{ $item->mapel->nama_mapel }}</td>
                                        <td>75</td>
                                        <td>{{ $item->rata_rata }}</td>
                                        <td>{{ $item->rata_ratak }}</td>
                                        <td>{{ $item->ket }}</td>
                                        <td>{{ $item->predikat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
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

                        <table class="table table-bordered" style="margin-top: 50px;">
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
