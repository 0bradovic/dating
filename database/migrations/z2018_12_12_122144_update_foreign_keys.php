<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('employee_type_id')->references('id')->on('employee_types')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('client_type_id')->references('id')->on('client_types')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('client_photos', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('favourites', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'client_id']);
        });

        Schema::table('scheduleds', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'client_id']);
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('transaction_type_id')->references('id')->on('transactions')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'client_id', 'transaction_id']);
        });

        Schema::table('discussions', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['client_id', 'employee_id']);
        });

        Schema::table('employee_photos', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('paid_photos', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'client_id', 'transaction_id']);
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('discussion_id')->references('id')->on('discussions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['discussion_id']);
        });

        Schema::table('bought_gifts', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees');
                //->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients');
                //->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions');
                //->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gift_id')->references('id')->on('gifts');
                //->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['discussion_id']);
        });

        Schema::table('employee_payments', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'client_id']);
        });

        Schema::table('employee_profile_photos', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
             $table->foreign('employee_photo_id')->references('id')->on('employee_photos')
                 ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'client_photo_id']);
        });

        Schema::table('client_profile_photos', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_photo_id')->references('id')->on('client_photos')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['client_id', 'client_photo_id']);
        });

        Schema::table('client_favourites', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['client_id', 'employee_id']);
        });

        Schema::table('stories', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('watched_stories', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('story_id')->references('id')->on('stories')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['client_id', 'story_id']);
        });

        Schema::table('client_matches', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('employee_interests', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('interest_id')->references('id')->on('interests')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'interest_id']);
        });

        Schema::table('client_interests', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('interest_id')->references('id')->on('interests')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'interest_id']);
        });

        Schema::table('employee_personalities', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('client_personalities', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('client_employee_personality_matches', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'client_id']);
        });

        Schema::table('employee_favourites', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');

            //$table->primary(['employee_id', 'client_id']);
        });

        Schema::table('client_preferances', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('client_cover_photos', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_photo_id')->references('id')->on('client_photos')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::table('client_notifications', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
