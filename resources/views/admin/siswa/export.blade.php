<table>
  <thead>
    <tr>
      <th>nis</th>
      <th>nama</th>
      <th>rayon</th>
      <th>jurusan</th>
      <th>rombel</th>
      <th>tahun_ajaran</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($datas as $item)
      <tr>
        <td>{{ $item->nis }}</td>
        <td>{{ $item->nama_siswa }}</td>
        <td>{{ $item->rayon_id }}</td>
        <td>{{ $item->jurusan_id }}</td>
        <td>{{ $item->rombel_id }}</td>
        <td>{{ $item->tahun_ajaran_id }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
