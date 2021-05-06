<table>
    <thead>
    <tr>
        <th>siswa_id</th>
        <th>mapel_id</th>
        <th>semester</th>
        <th>jenis_nilai_id</th>
        <th>nilai_pengetahuan</th>
        <th>nilai_keterampilan</th>
        <th>tahun_ajaran_id</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $item)
        <tr>
            <td>{{ $item->siswa_id }}</td>
            <td>{{ $item->mapel_id }}</td>
            <td>{{ $item->semester }}</td>
            <td>{{ $item->jenis_nilai_id }}</td>
            <td>{{ $item->nilai_pengetahuan }}</td>
            <td>{{ $item->nilai_keterampilan }}</td>
            <td>{{ $item->tahun_ajaran_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
