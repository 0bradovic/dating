<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_matches', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('client_id')->unsigned();
            $table->double('date_of_birth');
            $table->double('height');
            $table->double('weight');
            $table->string('body_type');
            $table->string('education');
            $table->string('smoking');
            $table->string('drinking');
            $table->string('eye_color');
            $table->string('hair_color');
            $table->string('nationality');
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
        Schema::dropIfExists('client_matches');
    }
}
