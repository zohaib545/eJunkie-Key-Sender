<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'admin';
        $user->password = bcrypt('12345678');
        $user->email = 'admin@bunchkeys.com';
        $user->save();
    }
}
