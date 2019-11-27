<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
//            $table->bigIncrements('id');
//            $table->unsignedBigInteger('user_id')->nullable();
//            $table->integer('post_id')->unsigned()->index();
            $table->string('title',255);
            $table->string('subtitle',100);
            $table->string('slug',100)->unique();
            $table->text('body');
            $table->boolean('status')->nullable();
            $table->integer('posted_by')->nullable();
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
            $table->timestamps();
//            $table->index('user_id');

//            //Relationships
//            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
