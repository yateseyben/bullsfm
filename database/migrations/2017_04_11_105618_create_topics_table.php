<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicsTable extends Migration {

	public function up()
	{
		Schema::create('topics', function(Blueprint $table) {
			$table->increments('id');
			$table->text('title');
			$table->text('content');
			$table->smallInteger('user_id');
			$table->timestamps();
			$table->string('topic_status_id');
		});
	}

	public function down()
	{
		Schema::drop('topics');
	}
}