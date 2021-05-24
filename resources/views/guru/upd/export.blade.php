<table>
  <thead>
  <tr>
      <th>ID Siswa</th>
      <th>Detail UPD ID</th>
      <th>Jenis Nilai ID</th>
      <th>Nilai UPD</th>
      <th>Jumlah Kehadiran</th>
      <th>Jumlah Tidak Hadir</th>
      <th>Semester</th>
  </tr>
  </thead>
  <tbody>
  @foreach($upd as $item)
      <tr>
          <td>{{ $item->siswa_id }}</td>
          <td>{{ $item->detail_upd_id }}</td>
          <td>{{ $item->jenis_nilai_id }}</td>
          <td>{{ $item->nilai_upd }}</td>
          <td>{{ $item->jumlah_kehadiran }}</td>
          <td>{{ $item->jumlah_tidak_hadir }}</td>
          <td>{{ $item->semester }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
