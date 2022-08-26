<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('event_id');
            $table->boolean('view')->default(false);
            $table->boolean('deleted_receiver')->default(false);
            
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            
            $table->foreign('event_id')
              ->references('id')
              ->on('events')
              ->onDelete('cascade');

            $table->foreign('receiver_id')
              ->references('id')
              ->on('users');

            $table->timestamps();
            

            //$table->unsignedBigInteger('id_success')->default(1);
/*
            $table->foreign('id_success')
              ->references('id')
              ->on('success');*/
              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
