<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->smallInteger('topic_id');
			$table->smallInteger('user_id');
			$table->string('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}