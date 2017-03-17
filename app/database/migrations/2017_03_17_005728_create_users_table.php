<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('level');
			$table->integer('current_xp');
			$table->integer('current_balance');
			$table->string('profile_img');
			$table->date('last_online_day');
			$table->rememberToken();
			$table->integer('admin');
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
		Schema::drop('users');
	}

}
