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
		Schema::create('news', function(Blueprint $table)
		{
            $table->increments('id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->text('body')->nullable();
            $table->string('image', 255)->nullable();

            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');

            $table->integer('trash')->default(0);
            $table->timestamps();
		});
        DB::table('news')->insert(
            array(
                'id' => '1',
                'title' => 'DTS Released',
                'body' => 'Get it now!',
                'image' => '',
                'author_id' => '1',
            )
        );
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
