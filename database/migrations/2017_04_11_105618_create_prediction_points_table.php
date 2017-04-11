<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePredictionPointsTable extends Migration {

	public function up()
	{
		Schema::create('prediction_points', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->smallInteger('prediction_id');
			$table->tinyInteger('points');
		});
	}

	public function down()
	{
		Schema::drop('prediction_points');
	}
}