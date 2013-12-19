<?php namespace MadRambles\Models;

class Tag extends \Eloquent {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	 *
	 * Post Relationship
	 *
	 * @return Relationship
	 */
	public function posts()
	{
		return $this->belongsToMany('MadRambles\Models\Post');
	}

	protected $guarded = array();

	public static $rules = array();
}
