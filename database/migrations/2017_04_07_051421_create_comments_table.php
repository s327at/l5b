<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->integer('id', true, true);
            $table->integer('user_id')->unsigned();
            $table->integer('moictati_id')->unsigned();
            $table->index('user_id');
            $table->index('moictati_id');
            $table->text('body');
            $table->boolean('moderated')->nullable()->default(NULL);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('moictati_id')->references('id')->on('moictati')->onDelete('cascade')->onUpdate('cascade');

           // $table->dateTime('created_at')->nullable()->default(NULL);
           // $table->dateTime('updated_at')->nullable()->default(NULL);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
    }
}
