<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('looking_for')->nullable();
            $table->date('date_of_birth');
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->double('height')->nullable();
            $table->double('weight')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('gender');
            $table->string('smoking')->nullable();
            $table->string('drinking')->nullable();
            $table->string('relationship')->nullable();
            $table->string('children')->nullable();
            $table->string('education')->nullable();
            $table->string('heading')->nullable();
            $table->string('about')->nullable();
            $table->string('occupation')->nullable();
            $table->string('nationality')->nullable();
            $table->double('credit')->nullable();
            $table->string('credit_card_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->integer('client_type_id')->unsigned()->default(1);
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('client_type_id')->references('client_type_id')->on('client_types')
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
        Schema::dropIfExists('clients');
    }
}
