<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nickname')->nullable();
            $table->string('looking_for');
            $table->date('date_of_birth');
            $table->string('language');
            $table->string('country');
            $table->string('city');
            $table->double('height');
            $table->double('weight');
            $table->string('body_type');
            $table->string('hair_color');
            $table->string('eye_color');
            $table->string('gender');
            $table->string('smoking');
            $table->string('drinking');
            $table->string('relationship');
            $table->string('children');
            $table->string('education');
            $table->string('nationality')->nullable();
            $table->string('occupation');
            $table->string('heading');
            $table->string('about');
            $table->string('credit_card_number');
            $table->integer('employee_type_id')->unsigned()->default(1);
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('employee_type_id')->references('employee_type_id')->on('employee_types')
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
        Schema::dropIfExists('employees');
    }
}
