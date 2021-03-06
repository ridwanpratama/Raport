<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\JenisNilai;

class JenisNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisNilai::insert([
          'jenis_nilai' => 'Nilai Harian',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PH1',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PH2',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PTS Ganjil',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PH3',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PH4',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PAS Ganjil',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PH5',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PH6',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PTS Genap',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PH7',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PH8',
        ]);

        JenisNilai::insert([
          'jenis_nilai' => 'PAT',
        ]);

    }
}
