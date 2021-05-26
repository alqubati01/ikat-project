<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_team extends Model
{
    //


    public function project()
    {
        return $this->belongsTo(Project::class,'Project_id');
    }


    public function team()
    {
        return $this->belongsTo(Team::class,'member_id');
//                return Team::where('cat_id',$this->id)->get();

    }


    


    public function assignation()
    {
        return $this->hasMany(Assignation::class,'member_id');
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


    public function task()
    {
        return $this->hasMany(Task::class);
    }


}
