<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Point::class,30)->create();
    }
}
