<?php namespace MadRambles\Models;

class Social extends \Eloquent {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'social';

	protected $guarded = array();

	public static $rules = array();

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
}
