<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'username' => 'Kevin Ilondo',
            'email' => 'kevinilondo05@gmail.com',
            'province' => 'Gauteng',
            'password' => bcrypt('qwertyuiop'),
            'about' => 'Just a nice guy',
            'role' => 'Individual',
        ]);

        $user = User::create([
            'username' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'province' => 'Gauteng',
            'password' => bcrypt('azertyuiop'),
            'about' => 'Just a nice guy',
            'role' => 'Individual',
        ]);
    }
}
