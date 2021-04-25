<?php

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
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'level' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('12345'),
            'level' => 'guru',
        ]);

        DB::table('jenis_nilai')->insert([
          'jenis_nilai' => 'PH1'
      ]);
    }
}
