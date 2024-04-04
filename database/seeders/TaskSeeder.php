<?php

namespace Database\Seeders;

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


        foreach ($tasks as $task) {
            $newTask = new Task();
            $newTask->task = $task['task'];
            $newTask->save();
        }
    }
}
