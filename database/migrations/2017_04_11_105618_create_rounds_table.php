<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoundsTable extends Migration {

	public function up()
	{
		Schema::create('rounds', function(Blueprint $table) {
			$table->increments('id');
			$table->smallInteger('round');
			$table->smallInteger('season')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('rounds');
	}
}