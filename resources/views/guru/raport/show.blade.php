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
                        <table class="table table-sm">
                          <tr>
                            <td rowspan="4">
                              <div><img src="{{ asset('assets/img/logo.png') }}" width="100px"></div>
                            </td>
                            <td style="float:right">
                              <b>YAYASAN PRAWITAMA</b><br>
                              <b>SMK WIKRAMA BOGOR</b>
                              <p>Jalan Raya Wangun Kel.Sindangsari - Bogor, Telp./Fax (0251)8242411 <br> Website : www.smkwikrama.sch.id, e-mail : prohumasi@smkwikrama.net</p>
                            </td>
                          </tr>
                        </table>
                        <hr color="black">
                        <table class="table table-sm">
                          <tr>
                            <td><center><b>LAPORAN PENCAPAIAN KOMPETENSI PESERTA DIDIK</b></center></td>
                          </tr>
                        </table>
                        <table class="table table-sm" width="50%" style="float: left;">
                          <tr>
                            <td>NIS : {{ $siswa->nis }}</td>
                            <td style="float: right">Tahun Pelajaran : {{ $tahun_ajaran->tahun_ajaran }}</td>
                          </tr>
                          <tr>
                            <td>Nama : {{ $siswa->nama_siswa }}</td>
                            <td style="float: right">Kelas : {{ $siswa->rombel->nama_rombel }}</td>
                          </tr>
                          <tr>
                            <td>Kompetensi Keahlian : {{ $siswa->jurusan->nama_jurusan }}</td>
                          </tr>
                        </table>
                        <table class="table table-sm">
                          <b>A. NILAI AKADEMIK</b>
                        </table>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th><center>MATA PELAJARAN</center></th>
                              <th><center>KKM</center></th>
                              <th><center>Pengetahuan</center></th>
                              <th><center>Keterampilan</center></th>
                              <th><center>Nilai Akhir</center></th>
                              <th><center>Predikat</center></th>
                              <th><center>Keterangan</center></th>
                            </tr>
                          </thead>
                          {{-- <tr>
                            <td colspan="7"><b>A. Muatan Nasional</b></td>
                          </tr> --}}
                          <tbody>
                            @foreach ($nilai as $item)
                            <tr>
                                <td>{{ $item->mapel->nama_mapel }}</td>
                                <td>75</td>
                                <td>{{ $item->nilai_pengetahuan }}</td>
                                <td>{{ $item->nilai_keterampilan }}</td>
                                <?php
                                  $nilai_akhir = ($item->nilai_pengetahuan + $item->nilai_keterampilan) / 2;
                                ?>
                                <td>{{ $nilai_akhir }}</td>
                                <?php
                                  $total = ($item->nilai_pengetahuan + $item->nilai_keterampilan) / 2;
                                  if ($total >= 95) { ?>
                                    <td>A+</td>
                                <?php }
                                    elseif ($total >= 90 && $total <= 94) { ?>
                                    <td>A</td>
                                <?php }
                                    elseif ($total >= 85 && $total <= 89) { ?>
                                    <td>A-</td>
                                <?php }
                                    elseif ($total >= 80 && $total <= 84) { ?>
                                    <td>B+</td>
                                <?php }
                                    elseif ($total >= 75 && $total <= 79) {?>
                                    <td>B</td>
                                <?php }
                                    elseif ($total >= 70 && $total <= 74) {?>
                                    <td>B-</td>
                                <?php }
                                    elseif ($total >= 60 && $total <= 69) {?>
                                    <td>C</td>
                                <?php }
                                    else { ?>
                                    <td>D</td>
                                <?php }
                                ?>

                                <?php
                                $total = ($item->nilai_pengetahuan + $item->nilai_keterampilan) / 2;
                                if ($total >= 75) { ?>
                                  <?php $predikat = "K" ?>
                                  <td>{{ $predikat }}</td>
                                <?php } else { ?>
                                  <?php $predikat = "BK" ?>
                                  <td>{{ $predikat }}</td>
                                <?php }
                                ?>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <table class="table table-sm">
                          <tr>
                            <td><b>B. EKSTRAKURIKULER</b></td>
                          </tr>
                        </table>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Kegiatan Ekstrakurikuler</th>
                              <th>Nilai</th>
                              <th>Jumlah Tidak Hadir</th>
                              <th>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{{ $upd->detail->nama_upd }}</td>
                              <td>{{ $upd->nilai_upd }}</td>
                              <td>{{ $upd->jumlah_tidak_hadir }}</td>
                              <?php
                              if ($upd->nilai_upd >= 75) { ?>
                                <td>K</td>
                              <?php } else { ?>
                                <td>BK</td>
                              <?php } ?>
                            </tr>
                          </tbody>
                        </table>
                        <table class="table table-sm">
                          <tr>
                            <td><b>C. KETIDAKHADIRAN</b></td>
                          </tr>
                        </table>
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Keterangan</th>
                              <th>Jumlah</th>
                              <th>Tanggal</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($absen as $item)
                            <tr>
                              <td>Sakit</td>
                              <td>{{ $item->sakit }} Hari</td>
                              <td>{{ $item->tanggal }}</td>
                            </tr>
                            <tr>
                              <td>Ijin</td>
                              <td>{{ $item->izin }} Hari</td>
                              <?php
                                if ($item->izin <= 0) { ?>
                                  <td>-</td>
                                <?php } else { ?>
                                  <td>{{ $item->tanggal }}</td>
                                <?php } ?>
                            </tr>
                            <tr>
                              <td>Tanpa Keterangan</td>
                              <td>{{ $item->alpha }} Hari</td>
                              <?php
                                if ($item->alpha <= 0) { ?>
                                  <td>-</td>
                                <?php } else { ?>
                                  <td>{{ $item->tanggal }}</td>
                                <?php } ?>
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
