<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\WorkersRepository;
use Corp\Repositories\DepartmentsRepository;
use Corp\Repositories\PositionsRepository;
use Corp\Worker;
use Corp\Http\Requests\WorkerRequest;

class WorkersController extends AdminController
{
    
    
   public function __construct(WorkersRepository $w_rep, DepartmentsRepository $d_rep, PositionsRepository $p_rep){
       parent::__construct();
      
        $this -> w_rep = $w_rep;
       $this -> d_rep = $d_rep;
       $this -> p_rep = $p_rep;
       $this -> template = env('THEME').'.admin.workers';
    }
    
   public function index(Request $request)
    {
        //
       
       if($request -> has('sort') ){
           $sort = $request -> input('sort');
            $workers = $this -> getWorkers($sort);
       }else
           $workers = $this -> getWorkers(); 
          
        $this -> title = 'Панель управления';
              
        $this->content = view(env('THEME').'.admin.workers_content') -> with('workers',  $workers) ->render();
        
        return $this->renderOutput();
        
    }
    
    protected function getWorkers($sort = false){
        if($sort)
           return $this -> w_rep -> get(['*'], $sort, false, true); 
        else
            return $this -> w_rep -> get(['*'], false, false, true);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        $this -> title = 'Добавить нового сотрудника';
        $positions = $this -> getPositions();
        $departments = $this -> getDepartments();
        //dd($categories);
       $posList = [];
              
        foreach($positions as $position){
               $posList[$position->id] = $position->name;
         }
        
        $depList = [];
        foreach($departments as $department){
            $depList[$department->id] = $department->name;
         }
                                
        $this -> content = view(env('THEME').'.admin.workers_create') -> with(['positions' => $posList, 'departments' => $depList]) -> render();
        return $this -> renderOutput();
    }
    
    protected function getPositions(){
        return $this -> p_rep -> get(['id', 'name']);
    }
    
     protected function getDepartments(){
        return $this -> d_rep -> get(['id', 'name']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerRequest $request)
    {
        //
       $data = $request -> except('_token', 'image', '_method');
        $worker = new Worker;
       
        if($request -> hasFile('image') ){
            $image  = $request -> file('image');
            $data['img'] = $this -> w_rep -> image($image);
        }
         $worker -> fill($data); 
  
        if($data['position_id'] != 1){
            $chefs = $worker->where('department_id', $data['department_id'])
                            -> where('position_id', $data['position_id'] - 1) -> get();
       
            if($worker -> save() ) {
               $chefs = $worker -> where('department_id', $worker -> department_id)
                            -> where('position_id', $worker->position_id - 1) -> get();
           
             $depList[$worker->department->id] = $worker->department->name;
            $posList[$worker->position->id] = $worker->position->name; 
            $chiefList = [];
            foreach($chefs as $chief){
               $chiefList[$chief->id] = $chief->name;
            }
            $this -> content = view(env('THEME').'.admin.workers_create') -> with(['positions' => $posList, 'departments' => $depList, 'worker' => $worker, 'chefs' => $chiefList]) -> render();
                return $this -> renderOutput();   
            }
        }
        
        if($worker -> save() ) return redirect() -> route('workers.index') -> with(['status-done' => 'Пользователь добавлен']);
  }
    
   
    public function show(Worker $worker)
    {
        //dd($worker);
        if($worker->img)
            $worker->img = json_decode($worker->img);
        
            $this -> content = view(env('THEME').'.admin.worker') -> with('worker', $worker) -> render();
       
            return $this -> renderOutput();   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
            
       $this -> title = 'Редактирование сотрудника  - '. $worker -> name;
        if($worker->img)
            $worker->img = json_decode($worker->img);
       
        $positions = $this -> getPositions();
        //dd($positions);
        $departments = $this -> getDepartments();
        //dd($categories);
        $posList = [];
        $current = false;
        
        foreach($positions as $position){
               $current = $worker -> position -> name;
                $posList[$current][$position->id] = $position->name;
         }
        
        $depList = [];
        foreach($departments as $department){
               $current = $worker -> department -> name;
                $depList[$current][$department->id] = $department->name;
         }
        
        if($worker -> chief_id != 0){
           
            //dd($currentChief);
            $chefs = $worker -> where('department_id', $worker -> department_id)
                            -> where('position_id', $worker->position_id - 1) -> get();
            //dd($chefs);
            $currentChief = $worker -> find($worker->chief_id);
            
            $chiefList = [];
            foreach($chefs as $chief){
                $current = $currentChief -> name;
               $chiefList[$current][$chief->id] = $chief->name;
            }
              
        $this -> content = view(env('THEME').'.admin.workers_create') -> with(['positions' => $posList, 'departments' => $depList, 'chefs' => $chiefList, 'worker' => $worker]) -> render();
              return $this -> renderOutput();              
        }else
            $this -> content = view(env('THEME').'.admin.workers_create') -> with(['positions' => $posList, 'departments' => $depList, 'worker' => $worker]) -> render();
            return $this -> renderOutput();
       
    }
    
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkerRequest $request, Worker $worker)
    {
        // dd($request);
        $data = $request -> except('_token', 'image', '_method');
        if($request -> hasFile('image') ){
            $image  = $request -> file('image');
            $data['img'] = $this -> w_rep -> image($image);
        }
        //dd($data);
          
        $oldDepartment = $worker -> department_id;
        $oldPosition = $worker -> position_id;
        
         $worker -> fill($data); 
        
        if($oldPosition != $data['position_id'] || $oldDepartment != $data['department_id']){
            if($worker -> update() ){
                 $chefs = $worker -> where('department_id', $worker -> department_id)
                            -> where('position_id', $worker->position_id - 1) -> get();
           
             $depList[$worker->department->id] = $worker->department->name;
            $posList[$worker->position->id] = $worker->position->name; 
            $chiefList = [];
            foreach($chefs as $chief){
              
               $chiefList[$chief->id] = $chief->name;
            }
               $this -> content = view(env('THEME').'.admin.workers_create') -> with(['positions' => $posList, 'departments' => $depList, 'worker' => $worker, 'chefs' => $chiefList]) -> render();
                return $this -> renderOutput();
            }
        }
        
        if($worker -> update() ){
                 return redirect() -> route('workers.index') -> with(['status-done' => 'Информация обновлена']);
        }
    }
  
    public function destroy(Worker $worker)
    {
        //
        $result = $this -> w_rep -> deleteArticle($worker);
        //dd($result);
        if(is_array($result) && !empty($result['error']) )
            return back() -> with($result);
        
        return redirect() -> route('workers.index') -> with($result);
    }
    
    public function search(WorkerRequest $request){
        $search = $request -> input('search');
        //dd($search);
        
        $workers = Worker::search($search, ['name', 'since_date', 'position.name', 'department.name'])-> paginate(config('settings.paginate') );
               
        $this->content = view(env('THEME').'.admin.workers_content') -> with('workers', $workers) -> render();
        
        return $this->renderOutput();
        
    }
 
}
