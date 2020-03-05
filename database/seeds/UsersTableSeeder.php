<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'João Pedro',
            'email' => 'tec.joao.freitas@gmail.com',
            'password' => bcrypt('738948**'),
        ]);
        $user->assignRole('Admin');
    }
}
