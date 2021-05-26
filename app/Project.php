<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    public function task()
    {
        return $this->hasMany(Task::class);
    }


    public function project_team()
    {
        return $this->hasMany(Project_team::class,'project_id');
//                return Project_team::where('project_id',$this->id)->where('project_id',$this->id)->get();

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activity()
    {
        return $this->hasMany(Ativity::class,'Project_id');
    }

    public function timeago($date){
        $created = new Carbon($date);
        $now = Carbon::now();
        $difference = ($created->diff($now)->days < 1)
            ? 'today'
            : $created->diffForHumans($now);

        return $difference;
    }

}
