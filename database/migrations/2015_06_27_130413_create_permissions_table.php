<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('permissions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 60);
            $table->timestamps();
        });
        DB::table('permissions')->insert(
            array(
                'id' => '1',
                'name' => 'admin'
            )
        );
        DB::table('permissions')->insert(
            array(
                'id' => '2',
                'name' => 'user'
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
		Schema::drop('permissions');
	}

}
