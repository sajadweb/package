<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('open');
            //user_id
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            //admin_id
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')
                ->on('admins')->onDelete('cascade');
            //type_ticket_id
            $table->integer('ticket_type_id')->unsigned()->nullable();
            $table->foreign('ticket_type_id')->references('id')
                ->on('ticket_types')->onDelete('cascade');
            //parent_id
            $table->string('title');
            $table->text('description');
            $table->string('created_at',50);
            $table->string('receive_at',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
