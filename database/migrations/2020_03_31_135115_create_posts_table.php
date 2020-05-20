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
            $table->bigIncrements('id');
            $table->string('image_sm', 255)->nullable();
            $table->string('image_md', 255)->nullable();
            $table->string('image_lg', 255)->nullable();
            $table->string('title', 255);
            $table->integer('category_id')->nullable();
            $table->text('content');
            $table->string('slug', 255);
            $table->boolean('status')->default(true)->nullable();
            $table->boolean('featured')->default(true)->nullable();
            $table->boolean('commentable')->default(true)->nullable();
            $table->integer('views')->default('0')->nullable();
            $table->integer('likes')->default('0')->nullable();
            $table->text('search_tags')->nullable();
            $table->string('m_title', 255)->nullable();
            $table->string('m_keywords', 255)->nullable();
            $table->string('m_description', 255)->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
