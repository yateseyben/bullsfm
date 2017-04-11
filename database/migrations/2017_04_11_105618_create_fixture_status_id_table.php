<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFixtureStatusIdTable extends Migration {

	public function up()
	{
		Schema::create('fixture_status_id', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('description');
		});
	}

	public function down()
	{
		Schema::drop('fixture_status_id');
	}
}