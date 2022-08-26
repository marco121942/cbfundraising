<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('remitter_id');
            $table->unsignedBigInteger('receiver_id');
            $table->string('title');
            $table->text('image')->nullable();
            $table->text('body')->nullable();
            $table->boolean('view')->default(false);
            $table->boolean('deleted_remitter')->default(false);
            $table->boolean('deleted_receiver')->default(false);
            
            $table->foreign('remitter_id')
              ->references('id')
              ->on('users');
            
            $table->foreign('receiver_id')
              ->references('id')
              ->on('users');
            
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
        Schema::dropIfExists('messages');
    }
}
