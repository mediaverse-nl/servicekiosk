<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
            $table->integer('user_message_id')->unsigned();
            $table->foreign('user_message_id')->references('id')->on('message');
            $table->integer('text_id')->unsigned();
            $table->foreign('text_id')->references('id')->on('message');
            $table->string('tekst', 255);
            $table->enum('status', ['answered', 'pending', 'completed'])->nullable();
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
        //
    }
}
