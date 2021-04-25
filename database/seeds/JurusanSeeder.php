<?php

use Illuminate\Database\Seeder;
use App\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::insert([
          'nama_jurusan' => 'Otomatisasi Tata Kelola Perkantoran',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'Rekayasa Perangkat Lunak',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'Teknik Komputer dan Jaringan',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'Multimedia',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'Bisnis Daring dan Pemasaran',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'Tata Boga',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'Perhotelan',
        ]);
    }
}
