<?php namespace MadRambles\Models;

class Image extends \Eloquent {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'images';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('image_name', 'image_link', 'image_altered');

	public static $rules = array();
}
