<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoictatiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moictati', function (Blueprint $table) {

            $table->integer('id', true, true);
           $table->timestamp('datetime')->useCurrent();
           $table->text('tag');
           $table->longText('coderz');

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
        Schema::drop('moictati');
    }
}
