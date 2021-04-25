<table>
    <thead>
    <tr>
        <th>Nama Siswa</th>
        <th>Mata Pelajaran</th>
        <th>Semester</th>
        <th>Nilai Pengetahuan</th>
        <th>Nilai Keterampilan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $item)
        <tr>
            <td>{{ $item->siswa->nama_siswa }}</td>
            <td>{{ $item->mapel->nama_mapel }}</td>
            <td>{{ $item->semester }}</td>
            <td>{{ $item->nilai_pengetahuan }}</td>
            <td>{{ $item->nilai_keterampilan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
