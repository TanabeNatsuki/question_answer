<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        'point_id' => '1',
        'name' => 'userA',
        'email' => 'index396@gmail.com',
        'password' => Hash::make('password123'),
        'status' => 1,
        'email_verify_token' => base64_encode('index396@gmail.com'),
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
      ]);
    }
}
