<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('positions')->insert([
                ['name' => 'Начальник', 'salary' => 20000],
                ['name' => 'Зам. начальника', 'salary' => 15000],
                ['name' => 'Менеджер', 'salary' => 10000],
                ['name' => 'Старший специалист', 'salary' => 7500],
                ['name' => 'Специалист', 'salary' => 5000]
        ]);
    }
}
