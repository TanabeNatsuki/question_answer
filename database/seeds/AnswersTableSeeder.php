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
        'question_id' => '1',
        'user_id' => '1',
        'content' => '回答A',
        'good' => '0',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
      ]);
    }
}
