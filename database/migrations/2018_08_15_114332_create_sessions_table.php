<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->datetime('date_time_started');
            $table->datetime('date_time_ended');
            $table->datetime('date_time_duration');
            $table->double('credit_spent');
            $table->boolean('session_type');
            $table->timestamps();

            // $table->foreign('employee_id')->references('employee_id')->on('employees')
            //     ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('client_id')->references('client_id')->on('clients')
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
        Schema::dropIfExists('sessions');
    }
}
