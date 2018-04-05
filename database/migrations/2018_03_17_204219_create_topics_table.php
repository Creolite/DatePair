<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('forums')->nullable();
            $table->string('trends')->nullable();
            $table->string('tags')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('forums_id')->unsigned()->nullable();
            $table->integer('trends_id')->unsigned()->nullable();
            $table->integer('tags_id')->unsigned()->nullable();
            $table->bigInteger('likes');
            $table->bigInteger('dislikes');
            $table->string('name_slug')->unique();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->foreign('forums_id')
                  ->references('id')->on('forums')
                    ->onDelete('cascade');
            $table->foreign('trends_id')
                  ->references('id')->on('trends')
                    ->onDelete('cascade');
            $table->foreign('tags_id')
                  ->references('id')->on('tags')
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
        Schema::dropIfExists('topics');
    }
}
