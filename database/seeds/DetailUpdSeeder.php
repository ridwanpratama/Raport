<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Detail;

class DetailUpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail::insert([
          'nama_upd' => 'Basket',
          'guru_id' => '1',
        ]);

        Detail::insert([
          'nama_upd' => 'Renang',
          'guru_id' => '3',
        ]);
    }
}
