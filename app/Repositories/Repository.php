<?php
namespace Corp\Repositories;

use Config;

abstract class Repository{
    protected $model = false;

    public function get($select = '*', $sort = false, $where = false, $pagination = false){
        
        if($sort)
            $builder = $this ->model -> select($select) -> orderBy($sort);
        else
            $builder = $this ->model -> select($select);
        
        if($where){
            $builder -> where($where[0],$where[1]);
        }
        
        if($pagination){
            return $this->check($builder -> paginate(Config::get('settings.paginate') ) );
        }
      
        return $this->check($builder -> get() );
    }
  
    
    
    public function one($id, $attr = []){
        $result = $this->model->where('id', $id) -> first();
        return $result;
    }
    
    protected function check($result){
        if($result -> isEmpty() ) return false;
        
         $result -> transform(function($item, $key) {
             if(is_string($item->img) && is_object(json_decode($item -> img) ) && json_last_error() == JSON_ERROR_NONE)
               $item -> img = json_decode($item -> img);
                return $item;
          });
        return $result;
    }
    
    
}

?>