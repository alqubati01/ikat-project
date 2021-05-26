<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_comment extends Model
{
    //

    public function project_team()
    {
        return $this->belongsTo(Project_team::class,'commenter_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
