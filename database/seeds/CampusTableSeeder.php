<?php

use Illuminate\Database\Seeder;

class CampusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('campuses')->insert([
          'name' => 'Plantel Tuxtla Gutiérrez',
          'address' => 'Penipak, Tuxtla Gutiérrez.',
          'postal_code' => '29000',
          'status' => 'ACTIVO',
      ]);
    }
}
