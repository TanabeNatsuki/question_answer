<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('answers')->insert([
        'user_id' => '1',
        'content' => '回答A',
        'good' => '0',
        'created_at' => time(),
        'updated_at' => time(),
      ]);
    }
}
