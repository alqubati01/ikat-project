<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_state extends Model
{
    //


    public function project_team()
    {
        return $this->belongsTo(Project_team::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
