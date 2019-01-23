<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientProfilePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_profile_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index();
            $table->integer('client_photo_id')->unsigned()->index();
            $table->timestamps();

            // $table->foreign('client_id')->references('client_id')->on('clients')
            //     ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('client_photo_id')->references('client_photo_id')->on('client_photos')
            //     ->onUpdate('cascade')->onDelete('cascade');

            // $table->primary(['client_id', 'client_photo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_profile_photos');
    }
}
