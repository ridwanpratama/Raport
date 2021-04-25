<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::insert([
          'name' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => Hash::make('12345'),
          'level' => 'admin',
      ]);

      User::insert([
          'name' => 'guru',
          'email' => 'guru@gmail.com',
          'password' => Hash::make('12345'),
          'level' => 'guru',
      ]);
    }
}
