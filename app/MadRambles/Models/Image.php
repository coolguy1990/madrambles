<?php namespace MadRambles\Models;

class Image extends \Eloquent {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'images';

	protected $guarded = array();

	public static $rules = array();
}
