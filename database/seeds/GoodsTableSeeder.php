<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('goods')->insert([
        'user_id' => '1',
        'answer_id' => '1',
        'good_or' => '0',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
      ]);
    }
}
