<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cntDep = 50; //создаем 50 отделов
        
        for($i = 1; $i <= $cntDep; $i++){
            Corp\Department::create(['name' => 'Отдел №'. $i]);
        }
    }
}
