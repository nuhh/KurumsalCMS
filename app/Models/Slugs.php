<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slugs extends Model
{

	protected $table = 'slugs';

	protected $primaryKey = 'slug';

	protected $fillable = [
		'slug', 'type_id', 'id'
	];

	public $timestamps = false;

}
