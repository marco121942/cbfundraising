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
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();
            $table->unsignedBigInteger('receiver_id')->nullable()->unsigned();
            $table->unsignedBigInteger('event_id')->nullable()->unsigned();
            $table->integer('success')->default(1);
            $table->boolean('view')->default(false);
            $table->boolean('deleted_receiver')->default(false);
            
            $table->foreign('user_id')
            ->nullable()->constrained()
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            
            $table->foreign('event_id')
            ->nullable()->constrained()
              ->references('id')
              ->on('events')
              ->cascadeOnUpdate()
              ->nullOnDelete();

            $table->foreign('receiver_id')
            ->nullable()->constrained()
              ->references('id')
              ->on('users')
              ->cascadeOnUpdate()
              ->nullOnDelete();

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
        Schema::dropIfExists('notifications');
    }
}
