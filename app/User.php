<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'surname',
    ];

    public function tasks()
    {
        $this->hasMany(Task::class, 'user_id', 'id');
    }

    public function assignedTasks()
    {
        $this->belongsToMany(
            Task::class,
            'users_tasks',
            'user_id',
            'task_id',
            'id'
        )->withTimestamps();
    }
}
