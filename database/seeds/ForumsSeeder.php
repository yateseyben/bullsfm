<?php

use Illuminate\Database\Seeder;

class ForumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();
    	DB::table('forums')->delete();

    	$roles = [

    		['id' => 1,
    		'name' => 'General Chat'],

            ['id' => 2,
            'name' => 'Bradford Bulls'],

            ['id' => 3,
            'name' => 'Castleford Tigers'],
    	];

    	foreach ($roles as $roles) {

    		DB::table('forums')->insert($roles);
    	}
    }
}
