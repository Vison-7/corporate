<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Auth;
use Menu;
use Gate;

class AdminController extends Controller
{
    //
     protected $w_rep;
     protected $user = false;
     protected $template;
     protected $content = false;
     protected $title;
     protected $vars;
    
    public function __construct(){
        $this -> user = Auth::user();
        //if(!$this -> user) abort(404);
    }
    
    public function renderOutput(){
        $this -> vars = array_add($this -> vars, 'title', $this -> title);
                        
        if($this -> content){
            $this -> vars = array_add($this -> vars, 'content', $this -> content);
        }
        
        $footer = view(env('THEME').'.footer') -> render();
        $this -> vars = array_add($this -> vars, 'footer', $footer);
        
        return view($this -> template) -> with($this -> vars);
     }

}
