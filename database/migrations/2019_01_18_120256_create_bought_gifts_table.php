<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoughtGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bought_gifts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gift_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->integer('employee_id')->unsigned()->index();
            $table->integer('transaction_id')->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bought_gifts');
    }
}
