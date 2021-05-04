<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\TahunAjaran;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahunAjaran::insert([
          'tahun_ajaran' => '2018/2019',
        ]);

        TahunAjaran::insert([
          'tahun_ajaran' => '2019/2020',
        ]);

        TahunAjaran::insert([
          'tahun_ajaran' => '2020/2021',
        ]);

        TahunAjaran::insert([
          'tahun_ajaran' => '2021/2022',
        ]);
    }
}
