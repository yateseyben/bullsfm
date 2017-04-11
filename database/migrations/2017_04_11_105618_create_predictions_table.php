<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePredictionsTable extends Migration {

	public function up()
	{
		Schema::create('predictions', function(Blueprint $table) {
			$table->increments('id');
			$table->smallInteger('user_id');
			$table->string('fixture_id')->nullable();
			$table->integer('home_team_id')->unsigned();
			$table->integer('home_team_score');
			$table->integer('away_team_id')->unsigned();
			$table->integer('away_team_score');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('predictions');
	}
}