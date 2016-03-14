<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'user122',
                'email' => 'user122@gmail.com',
                'password' => Hash::make(12345678),
                'role' => '2',
            ],
        ]);
    }
}
