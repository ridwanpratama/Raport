@extends('layouts.app')
@section('title', 'Data Raport')
@section('third_party_stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@push('page_css')
    <style>
        .ddtf-processed th.option-except>select {
            display: none;
        }

        .ddtf-processed th.option-except>div {
            display: block !important;
        }

        select {
            border: none;
            background-color: transparent;
        }

    </style>
@endpush
@section('pagetitle')
    <h1>Data Raport</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <form action="/raport/search" method="GET">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <input type="date" class="form-control mb-3 shadow-sm" name="startDate" id="startDate">
                        </div>
                        <div class="col-auto">
                            <label class="col-sm-2 mb-3"><b>-</b></label>
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control mb-3 shadow-sm" name="endDate" id="endDate">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Cari</button>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-success mb-3" data-toggle="modal"
                                data-target="#petunjuk">Petunjuk</a>
                        </div>
                    </div>

                    <div class="card my-3">
                        <div class="card-body">
                            <table id="table" class="table table-striped table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th class="option-except">#</th>
                                        <th class="option-except">NIS Siswa</th>
                                        <th class="option-except">Nama Siswa</th>
                                        <th>Rayon</th>
                                        <th>Jurusan</th>
                                        <th class="option-except">Semester</th>
                                        @isset($data)
                                            <th class="option-except">Mid Semester</th>
                                            @endif
                                            @isset($nilai)
                                                <th class="option-except">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($data)
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->siswa->nis }}</td>
                                                        <td>{{ $item->siswa->nama_siswa }}</td>
                                                        <td>{{ $item->siswa->rayon->nama_rayon }}</td>
                                                        <td>{{ $item->siswa->jurusan->nama_jurusan }}</td>
                                                        <td>
                                                            <a href="{{ route('raport1_show', $item->siswa_id) }}"
                                                                class="btn btn-info btn-sm">1</a>
                                                            <a href="{{ route('raport2_show', $item->siswa_id) }}"
                                                                class="btn btn-info btn-sm">2</a>
                                                            <a href="{{ route('raport3_show', $item->siswa_id) }}"
                                                                class="btn btn-info btn-sm">3</a><br>
                                                            <a href="{{ route('raport4_show', $item->siswa_id) }}"
                                                                class="btn btn-info btn-sm mt-1">4</a>
                                                            <a href="{{ route('raport5_show', $item->siswa_id) }}"
                                                                class="btn btn-info btn-sm mt-1">5</a>
                                                            <a href="{{ route('raport5_show', $item->siswa_id) }}"
                                                                class="btn btn-info btn-sm mt-1">6</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('mid1', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-warning btn-sm">PTS 1</a>
                                                            <a href="{{ route('mid2', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-primary btn-sm">PAS 2</a>
                                                            <a href="{{ route('mid3', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-warning btn-sm">PTS 3</a>
                                                            <a href="{{ route('mid4', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-primary btn-sm">PAS 4</a> <br>
                                                            <a href="{{ route('mid5', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-warning btn-sm mt-1">PTS 5</a>
                                                            <a href="{{ route('mid6', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-primary btn-sm mt-1">PAS 6</a>
                                                            <a href="{{ route('mid7', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-warning btn-sm mt-1">PTS 7</a>
                                                            <a href="{{ route('mid8', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-primary btn-sm mt-1">PAS 8</a><br>
                                                            <a href="{{ route('mid9', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-warning btn-sm mt-1">PTS 9</a>
                                                            <a href="{{ route('mid10', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-primary btn-sm mt-1">PAS 10</a>
                                                            <a href="{{ route('mid11', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-warning btn-sm mt-1">PTS 11</a>
                                                            <a href="{{ route('mid12', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                class="btn btn-primary btn-sm mt-1">PAT</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endif

                                                @isset($nilai)
                                                    @foreach ($nilai as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->siswa->nis }}</td>
                                                            <td>{{ $item->siswa->nama_siswa }}</td>
                                                            <td>{{ $item->siswa->rayon->nama_rayon }}</td>
                                                            <td>{{ $item->siswa->jurusan->nama_jurusan }}</td>
                                                            <td>{{ $item->semester }}</td>
                                                            <td>
                                                                <a href="{{ route('nilai_mingguan', [$item->siswa_id, $item->tahun_ajaran_id]) }}"
                                                                    class="btn btn-info btn-sm">Show</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                @endsection

                @section('third_party_scripts')
                    <script type="text/javascript" charset="utf8"
                        src="{{ asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}"></script>
                    <script src="{{ asset('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}"></script>
                    <script src="{{ asset('assets/js/ddtf.js') }}"></script>
                @endsection
                @push('page_scripts')
                    <script>
                        $(document).ready(function() {
                            $('#table').DataTable();
                            $('#table').ddTableFilter();
                        });

                    </script>
                @endpush
                @push('modal')
                    <div class="modal fade" id="petunjuk" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Petunjuk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Pastikan sudah melengkapi data-data nilai yang ada.</p>
                                    <p>Data yang sudah diinput bisa dilihat di menu Data Nilai.</p>
                                    <p>Semester 1 - 6 untuk raport persemester.</p>
                                    <p>Mid Semester untuk raport tengah semester. Petunjuk warna:</p>
                                    <a href="#" class="btn btn-warning mb-2">PTS</a>
                                    <a href="#" class="btn btn-primary mb-2">PAS/PAT</a>
                                    <ul>
                                        <li>PTS 1 = PTS SMT 1</li>
                                        <li>PAS 2 = PAS SMT 1</li>
                                        <li>PTS 3 = PTS SMT 2</li>
                                        <li>PAS 4 = PAS SMT 2</li>
                                        <li>PTS 5 = PTS SMT 3</li>
                                        <li>PAS 6 = PAS SMT 3</li>
                                        <li>PTS 7 = PTS SMT 4</li>
                                        <li>PAS 8 = PAS SMT 4</li>
                                        <li>PTS 9 = PTS SMT 5</li>
                                        <li>PAS 10 = PAS SMT 5</li>
                                        <li>PTS 11 = PTS SMT 6</li>
                                        <li>PAT = PAT</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endpush
