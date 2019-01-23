<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientEmployeePersonalityMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_employee_personality_matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index();
            $table->integer('employee_id')->unsigned()->index();
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
            $table->integer('sum');
            $table->timestamps();

            // $table->foreign('employee_id')->references('employee_id')->on('employees')
            //     ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('client_id')->references('client_id')->on('clients')
            //     ->onUpdate('cascade')->onDelete('cascade');

            // $table->primary(['employee_id', 'client_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_employee_personality_matches');
    }
}
