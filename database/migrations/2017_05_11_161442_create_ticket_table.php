<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ticket_id')->nullable()->unsigned();
            $table->foreign('ticket_id')->references('id')->on('ticket')->onDelete('cascade');
            $table->string('titel', 30);
            $table->string('text', 300);
            $table->enum('priority', [1, 2, 3, 4, 5]);
            $table->enum('status', ['answered', 'pending', 'completed']);
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
        Schema::dropIfExists('ticket');
    }
}
