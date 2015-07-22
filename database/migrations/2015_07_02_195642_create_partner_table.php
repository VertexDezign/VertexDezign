<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partner', function(Blueprint $table)
		{
            $table->increments('id')->unsigned();
            $table->string('title', 255);
            $table->string('link', 255);
            $table->string('image', 255);

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
		Schema::drop('partner');
	}

}
