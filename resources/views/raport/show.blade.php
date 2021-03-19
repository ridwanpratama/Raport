@extends('layouts.app')
@section('title', 'Data Raport')
@section('third_party_stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('pagetitle')
    <h1>Data Raport</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="javascript:void(processPrint());" class="btn btn-icon icon-left btn-primary">Print</a>
           <div class="card my-3">
            <div class="card-body" id="printMe">
                <table class="table table-sm" style="margin-bottom: 50px;">
                    <thead>
                        <tr>
                            <th>Nama Siswa:</th>
                            <th>NIS</th>
                            <th>Tingkat</th>
                            <th>Rombel</th>
                            <th>Rayon</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $siswa->nama_siswa }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->tingkat }}</td>
                            <td>{{ $siswa->rombel }}</td>
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
                            <td>{{ $item->predikat }}</td>
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
    var gAutoPrint = true;

    function processPrint(){

    if (document.getElementById != null){
    var html = '<HTML>\n<HEAD>\n';
    if (document.getElementsByTagName != null){
    var headTags = document.getElementsByTagName("head");
    if (headTags.length > 0) html += headTags[0].innerHTML;
    }

    html += '\n</HE' + 'AD>\n<BODY>\n';
    var printReadyElem = document.getElementById("printMe");

    if (printReadyElem != null) html += printReadyElem.innerHTML;
    else{
    alert("Error, no contents.");
    return;
    }

    html += '\n</BO' + 'DY>\n</HT' + 'ML>';
    var printWin = window.open("","processPrint");
    printWin.document.open();
    printWin.document.write(html);
    printWin.document.close();

    if (gAutoPrint) printWin.print();
    } else alert("Browser not supported.");

    }
</script>
@endpush