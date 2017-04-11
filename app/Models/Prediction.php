<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prediction extends Model {

	protected $table = 'predictions';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}