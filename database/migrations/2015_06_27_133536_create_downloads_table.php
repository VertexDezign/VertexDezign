<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('downloads', function(Blueprint $table)
		{
            $table->increments('id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->integer('state');
            $table->integer('category');
            $table->text('desc')->nullable();
            $table->text('info')->nullable();
            $table->text('features')->nullable();
            $table->text('credits')->nullable();
            $table->text('log')->nullable();
            $table->string('images', 255)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('download', 255)->nullable();
            $table->string('downloadExtern', 255)->nullable();

            $table->integer('trash')->default(0);
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
		Schema::drop('downloads');
	}

}
