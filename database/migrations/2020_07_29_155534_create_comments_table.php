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
            $table->id();
            $table->string('name');
            $table->text('comment');
            $table->string('email');
            $table->boolean('approved');
            $table->integer('post_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('comments',function($table){
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
        Schema::fropForeign(['post_id']);
    }
}
