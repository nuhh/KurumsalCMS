<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modules extends Model
{

	protected $table = 'modules';

	protected $primaryKey = 'id';

	protected $fillable = [
		'name', 'manage_url', 'is_loaded', 'is_dropped', 'is_needed_reflesh', 'is_active'
	];

	public $timestamps = true;

	protected $dates = [ 'created_at', 'updated_at' ];

}
