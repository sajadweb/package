<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plan', function (Blueprint $table) {
            $table->increments('id');
            //users
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            //plans
            $table->integer('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id')->references('id')
                ->on('plans')->onDelete('cascade');

            $table->string('expires_at');
            $table->string('domain');
            $table->string('creted_at');
            $table->string('updated_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_plan');
    }
}
