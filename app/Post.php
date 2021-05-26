<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function post_comment()
    {
        return $this->hasMany(Post_comment::class);
    }
//
//    public function notification()
//    {
//        return $this->hasOne(notification::class,'post_id');
//    }
//



}
