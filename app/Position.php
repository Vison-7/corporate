<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    public function workers(){
        return $this->hasMany('Corp\Worker');
    }
    
    public function departments(){
        return $this -> belongsToMany('Corp\Departments', 'department_position', 'position_id', 'department_id');
    }
}
