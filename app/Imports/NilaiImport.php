<?php

namespace App\Imports;

use App\Models\Guru\Nilai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Nilai([
            'siswa_id'  => $row['siswa_id'],
            'mapel_id' => $row['mapel_id'],
            'jenis_nilai_id'    => $row['jenis_nilai_id'],
            'nilai_pengetahuan'    => $row['nilai_pengetahuan'],
            'nilai_keterampilan'    => $row['nilai_keterampilan'],
            'semester'    => $row['semester'],
            'tahun_ajaran_id'    => $row['tahun_ajaran_id'],
        ]);
    }
}