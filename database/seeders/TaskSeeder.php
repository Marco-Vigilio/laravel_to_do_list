<?php

namespace Database\Seeders;

use App\Models\Lista;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'task' => 'Fare il letto',
            ],
            [
                'task' => 'Sport',
            ],
            [
                'task' => 'Leggere',
            ],
        ];

        $liste = Lista::all();

        foreach ($liste as $lista) {
            // Cicla su ogni task nell'array $tasks
            foreach ($tasks as $taskData) {
                // Crea una nuova istanza di Task
                $newTask = new Task();
                // Imposta l'id della lista
                $newTask->lista_id = $lista->id;
                // Imposta il task corrente
                $newTask->task = $taskData['task'];
                // Salva il task
                $newTask->save();
            }
        }
    }
}
