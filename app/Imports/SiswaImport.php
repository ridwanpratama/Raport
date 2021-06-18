<?php

namespace App\Imports;

use App\Models\Admin\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
  public function model(array $row)
    {
        return new Siswa([
            'nis'  => $row['nis'],
            'nama_siswa' => $row['nama'],
            'rayon_id'    => $row['rayon'],
            'jurusan_id'    => $row['jurusan'],
            'rombel_id'    => $row['rombel'],
            'tahun_ajaran_id'    => $row['tahun_ajaran'],
        ]);
    }
}
