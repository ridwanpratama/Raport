<table>
    <thead>
    <tr>
        <th>Nama Siswa</th>
        <th>Mata Pelajaran</th>
        <th>UH1</th>
        <th>UH2</th>
        <th>PTS Ganjil</th>
        <th>UH3</th>
        <th>UH4</th>
        <th>PAS Ganjil</th>
        <th>UH5</th>
        <th>UH6</th>
        <th>PTS Genap</th>
        <th>UH7</th>
        <th>UH8</th>
        <th>PAT</th>
        <th>Rata - rata</th>
        <th>Keterangan</th>
        <th>UH1 Keterampilan</th>
        <th>UH2 Keterampilan</th>
        <th>PTS Ganjil Keterampilan</th>
        <th>UH3 Keterampilan</th>
        <th>UH4 Keterampilan</th>
        <th>PAS Ganjil Keterampilan</th>
        <th>UH5 Keterampilan</th>
        <th>UH6 Keterampilan</th>
        <th>PTS Genap Keterampilan</th>
        <th>UH7 Keterampilan</th>
        <th>UH8 Keterampilan</th>
        <th>PAT Keterampilan</th>
        <th>Rata - rata Keterampilan</th>
        <th>Keterangan Keterampilan</th>
        <th>Predikat</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $item)
        <tr>
            <td>{{ $item->siswa->nama_siswa }}</td>
            <td>{{ $item->mapel->nama_mapel }}</td>
            <td>{{ $item->uh1k }}</td>
            <td>{{ $item->uh2k }}</td>
            <td>{{ $item->pts_ganjilk }}</td>
            <td>{{ $item->uh3k }}</td>
            <td>{{ $item->uh4k }}</td>
            <td>{{ $item->pas_ganjilk }}</td>
            <td>{{ $item->uh5k }}</td>
            <td>{{ $item->uh6k }}</td>
            <td>{{ $item->pts_genapk }}</td>
            <td>{{ $item->uh7k }}</td>
            <td>{{ $item->uh8k }}</td>
            <td>{{ $item->patk }}</td>
            <td>{{ $item->rata_ratak }}</td>
            <td>{{ $item->predikatk }}</td>
            <td>{{ $item->uh1k }}</td>
            <td>{{ $item->uh2k }}</td>
            <td>{{ $item->pts_ganjilk }}</td>
            <td>{{ $item->uh3k }}</td>
            <td>{{ $item->uh4k }}</td>
            <td>{{ $item->pas_ganjilk }}</td>
            <td>{{ $item->uh5k }}</td>
            <td>{{ $item->uh6k }}</td>
            <td>{{ $item->pts_genapk }}</td>
            <td>{{ $item->uh7k }}</td>
            <td>{{ $item->uh8k }}</td>
            <td>{{ $item->patk }}</td>
            <td>{{ $item->rata_ratak }}</td>
            <td>{{ $item->predikatk }}</td>
            <td>{{ $item->ket }}</td>
        </tr>
    @endforeach
    </tbody>
</table>