<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++) {
            $comment = new \App\Comment();
            $user = \App\User::find(rand(1, 3));
            $task = \App\Task::find(rand(1, 3));

            $comment->setUser($user);
            $comment->setTask($task);
            $comment->content = 'Content of the comment ' . $i;

            $comment->save();
        }
    }
}
