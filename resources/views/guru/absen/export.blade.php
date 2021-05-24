<table>
  <thead>
  <tr>
      <th>siswa_id</th>
      <th>sakit</th>
      <th>izin</th>
      <th>alpha</th>
      <th>semester</th>
      <th>jenis_nilai_id</th>
  </tr>
  </thead>
  <tbody>
  @foreach($absen as $item)
      <tr>
          <td>{{ $item->siswa_id }}</td>
          <td>{{ $item->sakit }}</td>
          <td>{{ $item->izin }}</td>
          <td>{{ $item->alpha }}</td>
          <td>{{ $item->semester }}</td>
          <td>{{ $item->jenis_nilai_id }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
