<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComment2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment2s', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('rest_id');
            $table->integer('user_id')->unsigned();
            $table->text('comment');
            $table->boolean('approved');
            $table->timestamps();
            $table->foreign('rest_id')
            ->references('id')->on('rest')
            ->onDelete('cascade');
        });
 }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('comment2s_rest_id_foreign');
        Schema::drop('comment2s');
    }
}
