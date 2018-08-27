<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();
    	DB::table('roles')->delete();

    	$roles = [

    		['id' => 1,
    		'name' => 'User',
            'guard_name' => 'web'],

    		['id' => 2,
    		'name' => 'Moderator',
            'guard_name' => 'web'],

    		['id' => 3,
    		'name' => 'Administrator',
            'guard_name' => 'web']
    	];

    	foreach ($roles as $roles) {

    		DB::table('roles')->insert($roles);
    	}
    }
}
