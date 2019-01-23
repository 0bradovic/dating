<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientPersonalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_personalities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
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
        Schema::dropIfExists('client_personalities');
    }
}
