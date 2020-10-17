<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlugTypes extends Model
{

	protected $table = 'slug_types';

	protected $primaryKey = 'id';

	protected $fillable = [
		'name', 'method'
	];

	public $timestamps = true;

	protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

}
