<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFixturesTable extends Migration {

	public function up()
	{
		Schema::create('fixtures', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('round_id')->unsigned();
			$table->integer('home_team_id')->unsigned();
			$table->integer('home_team_score');
			$table->integer('away_team_id');
			$table->integer('away_team_score');
			$table->timestamps();
			$table->tinyInteger('fixture_status_id');
		});
	}

	public function down()
	{
		Schema::drop('fixtures');
	}
}