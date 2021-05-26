<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_comment extends Model
{
    //


    public function team()
    {
        return $this->belongsTo(Team::class,'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
