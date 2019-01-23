<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePersonalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_personalities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('loving');
            $table->integer('confident');
            $table->integer('successful');
            $table->integer('faithful');
            $table->integer('flirty');
            $table->integer('compassionate');
            $table->integer('extroverted');
            $table->integer('caring');
            $table->integer('patient');
            $table->integer('adventurous');
            $table->integer('healthy_lifestyle');
            $table->timestamps();

            // $table->foreign('employee_id')->references('employee_id')->on('employees')
            //     ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_personalities');
    }
}
