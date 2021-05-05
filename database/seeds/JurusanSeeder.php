<?php

use App\Models\Admin\Jurusan;
use Illuminate\Database\Seeder;

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
          'nama_jurusan' => 'OTKP',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'RPL',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'TKJ',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'MMD',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'BDP',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'TBG',
        ]);

        Jurusan::insert([
          'nama_jurusan' => 'HTL',
        ]);
    }
}
