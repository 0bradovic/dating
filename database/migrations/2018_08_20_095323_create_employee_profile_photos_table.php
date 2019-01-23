<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeProfilePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_profile_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->index();
            $table->integer('employee_photo_id')->unsigned()->index();
            $table->string('url');
            $table->timestamps();

            // $table->foreign('employee_id')->references('employee_id')->on('employees')
            //     ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('client_photo_id')->references('client_photo_id')->on('client_photos')
            //     ->onUpdate('cascade')->onDelete('cascade');

            // $table->primary(['employee_id', 'client_photo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_profile_photos');
    }
}
