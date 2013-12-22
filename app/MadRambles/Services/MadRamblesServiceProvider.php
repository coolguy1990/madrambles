<?php namespace MadRambles\Services;

use Illuminate\Support\ServiceProvider;
use Config;

class MadRamblesServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->bindRepositories();
	}

	/**
	 * Bind repositories.
	 *
	 * @return  void
	 */
	protected function bindRepositories()
	{
		$this->app->bind('MadRambles\Repositories\PostRepositoryInterface', 'MadRambles\Repositories\DbPostRepository');

		$this->app->bind('MadRambles\Repositories\UserRepositoryInterface', 'MadRambles\Repositories\DbUserRepository');

		// $this->app->bind('Wardrobe', function()
		// {
		// 	return new \Wardrobe\Core\Facades\Wardrobe(new Repositories\DbPostRepository);
		// });
	}

}
