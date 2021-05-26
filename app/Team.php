<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //


    public function user()
    {
        return $this->belongsTo(User::class,'member_id');
    }

    public function project_team()
    {
        return $this->hasMany(Project_team::class,'member_id');
    }


    public function post()
    {
        return $this->hasMany(Post::class);
    }



}
