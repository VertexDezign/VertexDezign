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
        $passwordAdmin = bcrypt('admin');
        $passwordUser = bcrypt('user');
        DB::table('users')->insert(
            array(
                'id' => '1',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => $passwordAdmin,
                'firstname' => 'Firstname',
                'surname' => 'Surname',
                'birthdate' => '1995-01-27',
                'permission_id' => '1',
            )
        );
        DB::table('users')->insert(
            array(
                'id' => '2',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => $passwordUser,
                'firstname' => 'Firstname',
                'surname' => 'Surname',
                'birthdate' => '1995-01-27',
                'permission_id' => '2',
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
