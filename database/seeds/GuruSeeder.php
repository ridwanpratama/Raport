<?php

use Illuminate\Database\Seeder;
use App\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::insert([
            'nama_guru' => 'Udin',
            'jk' => 'Laki-laki',
            'no_telp' => '08967594843242',
        ]);

        Guru::insert([
          'nama_guru' => 'Putri',
          'jk' => 'Laki-laki',
          'no_telp' => '08532918534783',
        ]);

        Guru::insert([
          'nama_guru' => 'Ahmad',
          'jk' => 'Laki-laki',
          'no_telp' => '082198543721',
        ]);
    }
}
