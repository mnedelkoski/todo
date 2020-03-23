<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedUsers()
    {
        return $this->belongsToMany(
            User::class,
            'tasks_users',
            'task_id',
            'user_id',
            'id'
        )->withTimestamps();
    }
}
