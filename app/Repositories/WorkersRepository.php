<?php
namespace Corp\Repositories;

use Corp\Worker;
use Gate;
use Image;
use Config;

class WorkersRepository extends Repository{
    public function __construct(Worker $worker){
        $this->model = $worker;
    }
    
    public function one($id, $arr = []){
        $worker = parent::one($id, $arr);
        //подгрузка комментов
        if($worker && !empty($arr) ){
            $worker->load('position');
            $worker->load('department');
        } 
        return $worker;
    }
    
    public function image($image){
        //dd($request);
        
            if($image -> isValid() ){
                $str = str_random(8);
                
                $obj = new \stdClass;
                $obj -> mini = $str.'_mini.jpg';
                $obj -> path = $str.'.jpg';
                
                $img = Image::make($image);
                
                //dd($img);
                
                //ресайз изображения
                $img -> fit(Config::get('settings.image')['width'], Config::get('settings.image')['height']) 
                    -> save(public_path() . '/'. env('THEME').'/images/workers/'.$obj->path);
                
                $img -> fit(Config::get('settings.workers_img')['mini']['width'], Config::get('settings.workers_img')['mini']['height']) 
                    -> save(public_path() . '/'. env('THEME').'/images/workers/'.$obj->mini);
    
                return json_encode($obj);
              
            }
    }
               
    public function deleteArticle($worker){
     
             if($worker -> delete() )  return ['status-done' => 'Информация пользователя удалена'];
    }
}
?>