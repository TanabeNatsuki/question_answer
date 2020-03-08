<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
          'category_id' => '1',
          'title' => '質問A',
          'content' => '本文',
          'created_at' => new DateTime(),
          'updated_at' => new DateTime(),
        ]);
    }
}
