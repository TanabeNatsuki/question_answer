<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('points')->insert([
          'user_id' => '1',
          'point' => '0',
          'created_at' => new DateTime(),
          'updated_at' => new DateTime(),
        ]);
    }
}
