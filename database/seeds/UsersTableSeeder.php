<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Juan Carlos Montejo',
          'email' => 'jncrlsmontejo@gmail.com',
          'password' => bcrypt('secret'),
          'avatar' => 'default.png',
          'campuses_id' => 1,
      ]);
    }
}
