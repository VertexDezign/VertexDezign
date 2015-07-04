<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slider', function(Blueprint $table)
		{
            $table->increments('id')->unsigned();
            $table->string('title', 255);
            $table->text('desc');
            $table->string('link', 255);
            $table->string('image', 255);

            $table->integer('trash')->default(0);
			$table->timestamps();
		});
        DB::table('slider')->insert(
            array(
                'id' => '1',
                'title' => 'JCB320T',
                'desc' => 'We are working on a new project!',
                'link' => 'projects',
                'image' => 'slide.jpg',
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
		Schema::drop('slider');
	}

}
