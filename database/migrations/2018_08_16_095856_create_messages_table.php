<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->boolean('private');
            $table->boolean('employee_deleted');
            $table->boolean('client_deleted');
            $table->boolean('employee_readed')->default(0);
            $table->boolean('client_readed')->default(0);
            $table->integer('discussion_id')->unsigned();
            $table->integer('transaction_id')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('discussion_id')->references('discussion_id')->on('discussions')
            //     ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('transaction_id')->references('transaction_id')->on('transactions')
            //     ->onUpdate('cascade')->onDelete('cascade');

            // $table->primary(['discussion_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
