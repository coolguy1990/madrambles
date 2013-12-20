<?php namespace MadRambles\Models;

class Social extends \Eloquent {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'social';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('users_id', 'access_token', 'screen_name', 'social_id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('access_token_secret', 'lifetime');

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
