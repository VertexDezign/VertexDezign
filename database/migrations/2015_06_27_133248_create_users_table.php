<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();;
            $table->string('username', 60);
            $table->string('password', 60);
            $table->string('email', 60);
            $table->string('firstname', 45);
            $table->string('surname', 45);
            $table->date('birthdate');

            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions');

            $table->integer('trash')->default(0);
            $table->rememberToken();
            $table->string('token');
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'id' => '1',
                'username' => 'Wopster',
                'email' => 'stijnwop@gmail.com',
                'password' => '$2y$10$GP/tIKpy3.CGHpVr1OBDYuWx5KzMqlh7KXccHsplokFps.l3.5psO',
                'firstname' => 'Stijn',
                'surname' => 'Wopereis',
                'birthdate' => '1995-01-27',
                'permission_id' => '1',
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
		Schema::drop('users');
	}

}
