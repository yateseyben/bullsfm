<?php

use Illuminate\Database\Seeder;

class TopicStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();
    	DB::table('topic_statuses')->delete();

    	$topicStatuses = [

    		['id' => 1,
    		'name' => 'Open',
    		'description' => 'Topic is active and open to new posts.'],

    		['id' => 2,
    		'name' => 'Closed',
    		'description' => 'Topic is closed and posts cannot be made on this topic.']
    	];

    	foreach ($topicStatuses as $topicStatus) {

    		DB::table('topic_statuses')->insert($topicStatus);
    	}
       
    }

}
