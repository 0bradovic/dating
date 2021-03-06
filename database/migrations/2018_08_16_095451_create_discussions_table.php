<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index();
            $table->integer('employee_id')->unsigned()->index();
            $table->timestamps();

            // $table->foreign('client_id')->references('client_id')->on('clients')
            //     ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('employee_id')->references('employee_id')->on('employees')
            //     ->onUpdate('cascade')->onDelete('cascade');

            // $table->primary(['client_id', 'employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discussions');
    }
}
