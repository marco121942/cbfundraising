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
            $table->unsignedBigInteger('remitter_id')->nullable()->unsigned();
            $table->unsignedBigInteger('receiver_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('email');
            $table->text('body');
            $table->boolean('view')->default(false);
            $table->boolean('deleted_remitter')->default(false);
            $table->boolean('deleted_receiver')->default(false);
            
            $table->foreign('remitter_id')
            ->nullable()->constrained()
              ->references('id')
              ->on('users')
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
        Schema::dropIfExists('messages');
    }
}
