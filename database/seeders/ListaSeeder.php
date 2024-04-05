<?php

namespace Database\Seeders;

use App\Models\Lista;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {

            $newLista = new Lista();
            $newLista->user_id = $user->id;
            $newLista->save();
        }
    }
}
