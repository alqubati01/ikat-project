<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    //

    protected $fillable = [
        'message', 'url', 'state', 'type', 'user_id',
    ];
    public  function user(){
        return $this->belongsTo(User::class,'user_id');

    }
}
