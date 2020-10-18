<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{

	protected $table = 'pages';

	protected $primaryKey = 'id';

	protected $fillable = [
		'title', 'slug', 'content', 'seo_description', 'seo_keywords'
	];

	public $timestamps = true;

	protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

}
