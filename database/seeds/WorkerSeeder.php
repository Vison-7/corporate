<?php

use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(Corp\Worker::class, 50000)->create();
        
        //общее кол-во по должностям
        
        $chief = 50; // начальники
        $dep_chief = 150; //зам начальника
        $mng = 600; //менеджеры
        $senior = 1200; //старшие спецы
        $junior = 48000; //специалисты
        
        
        
        /*посев должностей*/
        
          /*
        DB::table('workers')
                    ->where('id', '<=', $chief)
                    ->update(['position_id' => 1]);
        
         DB::table('workers')
                    ->whereBetween('id', [1+$chief, 1+$chief+$dep_chief])
                    ->update(['position_id' => 2]);
        
         DB::table('workers')
                    ->whereBetween('id', [1+$chief+$dep_chief, 1+$chief+$dep_chief+$mng])
                    ->update(['position_id' => 3]);
        
         DB::table('workers')
                    ->whereBetween('id', [1+$chief+$dep_chief+$mng, 1+$chief+$dep_chief+$mng+$senior])
                    ->update(['position_id' => 4]);
        
         DB::table('workers')
                    ->whereBetween('id', [1+$chief+$dep_chief+$mng+$senior, 1+$chief+$dep_chief+$mng+$senior+$junior])
                    ->update(['position_id' => 5]);
        */
        // посев отделов
        
        $cnt = 50; //кол-во отделов
        
        //кол-во сотрудников в одном отделе
        $oneChief = 1; //
        $oneDepСhief = 3;
        $oneMng = 12;
        $oneSenior = 24;
        $oneJunior = 960;
        /*
        for($x = 1; $x <= $cnt; $x++){
            for($y = 1; $y <= 50; $y += $oneChief){
                if($y != 1)
                DB::table('workers')
                    ->whereBetween('id', [$y-1, $y])
                    ->update(['department_id' => $x++]);
            }
        }
        
        for($x = 1; $x <= $cnt; $x++){
            for($y = 50; $y <= 200; $y += $oneDepСhief){
                if($y != 50)
                DB::table('workers')
                    ->whereBetween('id', [$y-$oneDepСhief+1, $y])
                    ->update(['department_id' => $x++]);
            }
        }
        
        for($x = 1; $x <= $cnt; $x++){
            for($y = 200; $y <= 800; $y += $oneMng){
                if($y != 200)
                DB::table('workers')
                    ->whereBetween('id', [$y-$oneMng+1, $y])
                    ->update(['department_id' => $x++]);
            }
        }
        
        for($x = 1; $x <= $cnt; $x++){
            for($y = 800; $y <= 2000; $y += $oneSenior){
                if($y != 800)
                DB::table('workers')
                    ->whereBetween('id', [$y-$oneSenior+1, $y])
                    ->update(['department_id' => $x++]);
            }
        }
        
        for($x = 1; $x <= $cnt; $x++){
            for($y = 2000; $y <= 50000; $y += $oneJunior){
                if($y != 2000)
                DB::table('workers')
                    ->whereBetween('id', [$y-$oneJunior+1, $y])
                    ->update(['department_id' => $x++]);
            }
        }
                
        */ 
 
       //посев chief_id
      
        for($x = 1; $x <= 50; $x++){
             for($y = 50; $y <= 200; $y+=3){
                 if($y != 50)
                  DB::table('workers')
                    ->whereBetween('id', [$y-2, $y])
                    ->update(['chief_id' => $x++]);
           }
             
        }
        
        for($x = 51; $x <= 200; $x++){
             for($y = 200; $y <= 800; $y+=4){
                 if($y != 200)
                  DB::table('workers')
                    ->whereBetween('id', [$y-3, $y])
                    ->update(['chief_id' => $x++]);
           }
             
        }
        
        
        for($x = 201; $x <= 800; $x++){
             for($y = 800; $y <= 2000; $y+=2){
                 if($y != 800)
                  DB::table('workers')
                    ->whereBetween('id', [$y-1, $y])
                    ->update(['chief_id' => $x++]);
           }
             
        }
           
        for($x = 801; $x <= 2000; $x++){
             for($y = 2000; $y <= 50000; $y+=40){
                 if($y != 2000)
                  DB::table('workers')
                    ->whereBetween('id', [$y-39, $y])
                    ->update(['chief_id' => $x++]);
           }
             
        }
       
    }
}
