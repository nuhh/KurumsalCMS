<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BackendUsers extends Model
{

	protected $table = 'backend_users';

	protected $primaryKey = 'id';

	protected $fillable = [
		'username', 'password'
	];

	public $timestamps = true;

	protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

}
