<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedSubjectCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('my_classes', function ($table) {
		    $table->integer('subject')->unsigned()->index();
		    $table->foreign('subject')->references('id')->on('subjects');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_classes', function ($table) {
	       $table->dropColumn('subject');
        });

    }
}
