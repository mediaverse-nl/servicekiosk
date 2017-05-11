<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButtonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('button', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('console_id')->unsigned();
            $table->foreign('console_id')->references('id')->on('console')->onDelete('cascade');
            $table->integer('button_id')->nullable()->unsigned();
            $table->foreign('button_id')->references('id')->on('button')->onDelete('cascade');
            $table->binary('image_link')->nullable();
            $table->string('website_link', 120)->nullable();
            $table->string('name_tag', 30);
            $table->enum('button_type', ['website', 'category', 'non'])->value('website');
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
        Schema::dropIfExists('button');
    }
}
