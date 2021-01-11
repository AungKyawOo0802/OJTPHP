<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('description');
            $table->integer('status')->defualt(1);
            $table->integer('create_user_id');
            $table->integer('updated_user_id');
            $table->integer('deleted_user_id')->nullable();
            $table->datetime('created_at');
            $table->datetime('updated_at');
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
