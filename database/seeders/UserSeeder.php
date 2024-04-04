<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin';
        $admin->password = Hash::make('12345');
        $admin->save();

        $users = [
            [
                'name' => 'Mario',
                'email' => 'mariuccio@libero.it'
            ],
            [
                'name' => 'Carla',
                'email' => 'carLa@live.com'
            ],
        ];


        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make('12345');
            $newUser->save();
        }

        for ($i = 1; $i <= 2; $i++) {
            $newUserFaker = new User();
            $newUserFaker->name = $faker->unique()->firstName;
            $newUserFaker->email = $faker->unique()->email;
            $newUserFaker->password = Hash::make('12345');
            $newUserFaker->save();
        }
    }
}
