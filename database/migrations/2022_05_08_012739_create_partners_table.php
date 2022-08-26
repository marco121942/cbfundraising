<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('event_id')->nullable();
            $table->string('name');
            $table->text('image')->nullable();
            $table->text('body')->nullable();
            $table->string('link');
            $table->text('gifcard1')->nullable();
            $table->text('gifcard2')->nullable();
            $table->text('gifcard3')->nullable();
            $table->text('cupon1')->nullable();
            $table->text('cupon2')->nullable();
            $table->text('cupon3')->nullable();
            
            // $table->foreign('event_id')
            //   ->references('id')
            //   ->on('events');

            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            
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
        Schema::dropIfExists('partners');
    }
}
