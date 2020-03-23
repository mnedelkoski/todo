<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Task;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assigneesPerTask = [
            1 => [2, 3],
            2 => [1, 3],
            3 => [1, 2, 3],
        ];

        for ($i = 1; $i < 4; $i++) {
            $task = new Task();
            $user = User::find($i);
            $task->setUser($user);
            $task->title = 'Task ' . $i;
            $task->description = 'Description of the task ' . $i;

            $task->save();

            $users = User::whereIn('id', $assigneesPerTask[$i])
                ->get()
                ->all();

            $task->assignUsers($users);

            $task->save();
        }
    }
}
