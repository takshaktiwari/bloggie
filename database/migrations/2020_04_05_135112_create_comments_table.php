<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id');
            $table->string('usr_name');
            $table->string('usr_email');
            $table->text('usr_comment');
            $table->string('re_usr_name')
                    ->nullable()
                    ->comment('User name which is replied');
            $table->integer('re_comment_id')
                    ->nullable()
                    ->comment('comment id which is replied');
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
        Schema::dropIfExists('comments');
    }
}
