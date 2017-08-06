<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable =   
        [
            'name',
            'slutt_dato',
            'start_dato',
            'body',
        ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
