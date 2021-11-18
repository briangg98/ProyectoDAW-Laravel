<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Administrador
        User::create([
            'name' => 'Brian',
            'email' => 'brian-galindo@hotmail.com',
            'password' => bcrypt('12345qwerty'),
            'role' => 0,
        ]);

        //Support
        User::create([
            'name' => 'Jonathan',
            'email' => 'jonathan@gmail.com',
            'password' => bcrypt('12345qwerty'),
            'role' => 1,
        ]);

        //Cliente
        User::create([
            'name' => 'Julia',
            'email' => 'julia59@hotmail.com',
            'password' => bcrypt('12345qwerty'),
            'role' => 2,
        ]);
    }
}
