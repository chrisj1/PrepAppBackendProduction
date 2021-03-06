<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('user_classes', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('class_id')->unsigned()->index();
		    $table->foreign('class_id')->references('id')->on('my_classes');
		    $table->integer('user_id')->unsigned()->index();
		    $table->foreign('user_id')->references('id')->on('users');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
