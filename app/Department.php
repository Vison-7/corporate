<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function workers(){
        return $this->hasMany('Corp\Worker'); 
    }
   
    public function positions(){
        return $this -> belongsToMany('Corp\Position', 'department_position', 'department_id', 'position_id' );
    }
}
