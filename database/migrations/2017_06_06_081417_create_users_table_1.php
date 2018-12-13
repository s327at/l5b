<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::table('users', function (Blueprint $table) {



            //  $table->dateTime('created_at')->nullable()->default(NULL);
            //  $table->dateTime('updated_at')->nullable()->default(NULL);
            //  $table->timestamp('created_at')->useCurrent();
            // $table->timestamp('updated_at')->useCurrent();
            $table->integer('isadmin', false, true)->default(0);
            $table->boolean('activated')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
