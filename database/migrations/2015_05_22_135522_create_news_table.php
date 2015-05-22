<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('news',function(Blueprint $table)
            {
                $table->increments('id')->unsigned();
                $table->string('title', 255)->nullable();
                $table->text('body')->nullable();
                $table->integer('author_id');
                //$table->foreign('author_id')->references('id')->on('users');
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
		Schema::drop('news');
	}

}
