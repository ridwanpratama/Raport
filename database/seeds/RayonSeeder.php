<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Rayon;

class RayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rayon::insert([
          'nama_rayon' => 'Cicurug 1',
          'guru_id' => '3',
        ]);

        Rayon::insert([
          'nama_rayon' => 'Cicurug 2',
          'guru_id' => '1',
        ]);

        Rayon::insert([
          'nama_rayon' => 'Cicurug 3',
          'guru_id' => '2',
        ]);

        Rayon::insert([
          'nama_rayon' => 'Cicurug 4',
          'guru_id' => '1',
        ]);
    }
}
