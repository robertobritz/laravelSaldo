<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Roberto A. Britz',
            'email' => 'roberto.britz@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'Outro Usuário',
            'email' => 'outro.britz@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
