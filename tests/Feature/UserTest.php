<?php

namespace Tests\Feature;

use Auth;
use Tests\TestCase;
use Tests\Helpers\UserHelper;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Session;

class UserTest extends TestCase
{
	use DatabaseTransactions;

	public function setUp()
	{
    	parent::setUp();
		$this->userHelper = new UserHelper;
	}

    public function testAUserCanLogIn()
    {
    	$user = $this->userHelper->newUser();
    	
    	Session::start();

    	$response = $this->call('POST', '/login', 
    		[
    			'email' => $user->getEmail(),
    			'password' => 'secret',
    			'_token' => csrf_token()
    		]);

    	$this->assertAuthenticated($guard = null);
    }
}
