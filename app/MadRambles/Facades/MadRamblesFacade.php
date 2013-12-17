<?php namespace MadRambles\Facades;

use Illuminate\Support\Facades\Facade;

class MadRamblesFacade extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'MadRambles'; }
}
