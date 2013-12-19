<?php namespace MadRambles\Models;

use Cache;
use Carbon\Carbon;

class Post extends \Eloquent{

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 *
	 * User Relationship
	 *
	 * @return Relationship
	 */
	public function user()
	{
		return $this->belongsTo('MadRambles\Models\User');
	}

	/**
	 *
	 * Tag Relationship
	 *
	 * @return Relationship
	 */
	public function tags()
	{
		return $this->belongsToMany('MadRambles\Models\Tag');
	}

}
