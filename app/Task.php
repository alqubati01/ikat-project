<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function project_team()
    {
        return $this->belongsTo(Project_team::class,'owner_id');
    }

    public function assignation()
    {
        return $this->hasOne(Assignation::class,'task_id');
    }

    public function task_comment()
    {
        return $this->hasMany(Task_comment::class);
    }

    public function ativity()
    {
        return $this->hasMany(Ativity::class);
    }

    public function task_state()
    {
        return $this->hasMany(Task_state::class);
    }



}
