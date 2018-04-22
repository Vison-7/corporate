<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workers', function (Blueprint $table) {
            //
            $table->integer('department_id')->unsigned()->default(1);
            $table->foreign('department_id')->references('id')->on('departments');
            
            $table->integer('position_id')->unsigned()->default(1);
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workers', function (Blueprint $table) {
            //
        });
    }
}
