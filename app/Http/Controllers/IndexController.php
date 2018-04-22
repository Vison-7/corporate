<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Config;
use Corp\Repositories\DepartmentsRepository;
use Corp\Worker;

class IndexController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //protected $workers;
    
    public function __construct(DepartmentsRepository $d_rep){
       
        $this->d_rep = $d_rep;
        $this->template = env('THEME').'.index';
    }
    
    /*
    protected function getWorkers($array){
        return $this -> workers[] = $array;
    }
    */
    
     protected function getDepartments(){
        $departments = $this -> d_rep ->get(['id', 'name']);
        
        if($departments){
           $departments->load('workers');
        }
          return $departments;
    }
    
    public function index()
    {
        //
        $this -> title = 'Список отделов и сотрудников компании';
        
        $departments = $this -> getDepartments();
        
        //dd($departments);
          
        $content = view(env('THEME').'.index_content')
            -> with(['departments' => $departments])->render();
        $this -> vars = array_add($this -> vars, 'content', $content);
            
        return $this->renderOutput();
        
        // 2 вариант (неудачный - результат выдает 500 ошибку)
        
         /*  
         //формируем для вывода списка работников массив типа ключ - модель
        $w = Worker::select('*') -> chunk(1000, function($workers){
            foreach($workers as $worker){
                 $this -> getWorkers($worker);
            }
        });
        
        // Массив для соответствий дочерних элементов их родительским (подчиненный => начальник)
        
        $array = [];
            foreach($this->workers as $worker){
                $array[$worker['id'] ] = $worker['chief_id'];
            }
        //dd($array);
               
        $content = view(env('THEME').'.variant2')
            -> with(['workers' => $this->workers, 'array' => $array])->render();
        $this -> vars = array_add($this -> vars, 'content', $content);
            return $this->renderOutput();
        
        */
        
        
    }

  public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
