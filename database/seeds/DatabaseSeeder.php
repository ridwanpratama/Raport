<?php

use App\Models\Admin\TahunAjaran;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(JenisNilaiSeeder::class);
        $this->call(TahunAjaranSeeder::class);
        $this->call(RombelSeeder::class);
        $this->call(RayonSeeder::class);
        $this->call(DetailUpdSeeder::class);
    }
}
