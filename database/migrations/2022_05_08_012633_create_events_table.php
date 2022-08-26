<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');

            $table->string('slug')->unique();
            $table->string('title1');
            $table->text('description1');
            $table->text('eventImage1');
            $table->string('title2');
            $table->text('description2');
            $table->text('eventImage2');
            $table->string('title3');
            $table->text('description3');
            $table->text('eventImage3');
            $table->integer('duration')->default(30);
            $table->integer('view_count')->default(0);
            $table->integer('shared_count')->default(0);
            $table->integer('status')->default(1);
            
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
                        
            $table->timestamps();


            
            //$table->decimal('recaudation', 20, 6)->default(0,00);
            //$table->boolean('is_approved')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
