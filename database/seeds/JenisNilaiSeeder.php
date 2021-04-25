<?php

use Illuminate\Database\Seeder;
use App\Jenisnilai;

class JenisNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenisnilai::insert([
          'jenis_nilai' => 'PH1',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PH2',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PTS Ganjil',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PH3',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PH4',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PAS Ganjil',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PH5',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PH6',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PTS Genap',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PH7',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PH8',
        ]);

        Jenisnilai::insert([
          'jenis_nilai' => 'PAT',
        ]);
    }
}
