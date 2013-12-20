<?php namespace MadRambles\Models;

class Tag extends \Eloquent {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'url_name');

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

	public static $rules = array();
}
