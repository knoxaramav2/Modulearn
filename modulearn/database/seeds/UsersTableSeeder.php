<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=0; $x<30; $x++){
            DB::table('users')->insert([
                'name' =>str_random(5),
                'email' =>str_random(8).'@test.com',
                'password' => bcrypt('password')
            ]);
        }
    }
}
