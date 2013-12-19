<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('social', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('users_id')->unsigned()->index();
			$table->string('access_token');
			$table->string('access_token_secret');
			$table->string('screen_name');
			$table->integer('social_id');
			$table->integer('lifetime');
			$table->foreign('users_id')->references('id')->on('users');
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
		Schema::drop('social');
	}

}
