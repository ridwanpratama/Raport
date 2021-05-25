<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Rombel;

class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Rombel::insert([
        'nama_rombel' => 'XII-1',
        'jurusan_id' => '2',
        'tingkat' => 'XII',
      ]);

      Rombel::insert([
        'nama_rombel' => 'XII-2',
        'jurusan_id' => '2',
        'tingkat' => 'XII',
      ]);

      Rombel::insert([
        'nama_rombel' => 'XII-3',
        'jurusan_id' => '2',
        'tingkat' => 'XII',
      ]);

      Rombel::insert([
        'nama_rombel' => 'XII-4',
        'jurusan_id' => '2',
        'tingkat' => 'XII',
      ]);
    }
}
