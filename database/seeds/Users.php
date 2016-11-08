<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => str_random(5),
            'email' => str_random(5).'@gmail.com',
            'password' => bcrypt('password'),
    }
}
