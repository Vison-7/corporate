<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Worker extends Model
{
    //
    use Eloquence;
    
    protected $searchableColumns = ['name', 'since_date'];
    
    protected $fillable = ['name', 'department_id', 'position_id', 'chief_id', 'img', 'since_date'];
    
    protected $dates = ['since_date'];
    
    public function department(){
        return $this->belongsTo('Corp\Department');
    }
    
    public function position(){
        return $this->belongsTo('Corp\Position');
    }
}
