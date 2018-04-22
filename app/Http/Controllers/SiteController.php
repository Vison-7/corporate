<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
//хранилище данных меню
use Menu;

class SiteController extends Controller
{
    // repository(хранилище)
    //возвращает объект класса нужного хранилища - связующего контроллер с БД
    
    //departments
    protected $d_rep;
    
    //workers
     protected $w_rep;
   
    //переменные передачи тегов head
   
    protected $title;
    
    //шаблон
     protected $template;
    //массив переменных, передаваемых в шаблон
     protected $vars;
            
    //передача элементов, которые формируют макет сайта
    protected function renderOutput(){
        // МЕНЮ
        $menu = $this->getMenu();
        //dd($menu);
        
        $navigation = view(env('THEME').'.navigation')->with('menu', $menu) -> render();
  
        $this -> vars = array_add($this->vars, 'navigation', $navigation);
        
        //ТЕГИ HEAD
         $this->vars = array_add($this->vars, 'title', $this -> title);
        
        //FOOTER
        $footer = view(env('THEME').'.footer') -> render();
        $this->vars = array_add($this->vars, 'footer', $footer);
        return view($this->template)->with($this->vars);
    }
    
        public function getMenu(){
        return Menu::make('adminMenu', function($menu){
                     
            $menu->add('Панель управления', ['route' => 'workers.index']);
                        
        });
    }
}

