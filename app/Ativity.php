<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ativity extends Model
{
    //

    public $table="ativities";

    public function project()
    {
//       return Project::where('id',$this->Project_id)->get();

        return $this->belongsTo(Project::class,'Project_id');
    }

    public function project_team()
    {
        return $this->belongsTo(Project_team::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
