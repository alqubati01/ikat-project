<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignation extends Model
{
    //


    public function project_team()
    {
        return $this->belongsTo(Project_team::class,'member_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }

}
