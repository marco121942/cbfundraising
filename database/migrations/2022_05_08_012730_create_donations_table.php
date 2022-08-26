<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('user_id');
            
            $table->integer('ticket')->default(2);
            $table->integer('count')->default(0);
            $table->integer('playeds')->default(0);
            
            $table->decimal('money', 20, 6);//---------
            
            $table->foreign('event_id')
              ->references('id')
              ->on('events')
              ->onDelete('cascade');
            
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            
            $table->timestamps();
            
            //$table->unsignedBigInteger('ticket')->default(1);
            
            /*$table->foreign('ticket')
              ->references('id')
              ->on('tickets');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
