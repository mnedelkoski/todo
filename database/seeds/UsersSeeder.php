<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            $user = new \App\User();
            $user->name = 'Name' . $i;
            $user->surname = 'Surname' . $i;
            $user->email = 'user' . $i . '@email.com';

            $user->save();
        }
    }
}
