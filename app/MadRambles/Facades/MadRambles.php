<?php namespace MadRambles\Facades;

use App, View;
use Illuminate\Auth\Guard;
use Illuminate\Auth\EloquentUserProvider;
use MadRambles\Repositories\PostRepositoryInterface;

class MadRambles
{
	/**
	 * The post repository implementation.
	 *
	 * @var MadRambles\PostRepositoryInterface
	 */
	//protected $postsRepo;

	/**
	 * Create a new madramble facade instance.
	 *
	 * @param \MadRambles\Repositories\PostRepositoryInterface
	 *
	 * @return \MadRambles\Facades\MadRambles
	 */
	// public function __construct(PostRepositoryInterface $postsRepo)
	// {
	// 	$this->postsRepo = $postsRepo;
	// }

	/**
	 * Fetch posts
	 *
	 * @param array $params
	 *
	 * @return Posts
	 */
	// public function posts($params = array())
	// {
	// 	return $this->postsRepo->facadeSearch($params);
	// }

	/**
	 * Fetch all tags
	 */
	// public function tags()
	// {
	// 	return $this->postsRepo->allTags();
	// }

	/**
	 * Generate a route to a named group
	 *
	 * @param string $route
	 * @param mixed  $param
	 *
	 * @return string
	 */
	// public function route($route, $param = null)
	// {
	// 	if($route === '/')
	// 	{
	// 		return route('madramble.index');
	// 	}
	// 	else
	// 	{
	// 		return \URL::route('madrambles.'.$route, $param);
	// 	}
	// }

	// public function setupViews()
	// {
	// 	View::addLocation(public_path().'/'.);
	// }

	/**
	 * Auth the current user.
	 *
	 * @return \Illuminate\Auth\Guard
	 */
	public function getMadRamblesAuth()
	{
		$provider = $this->createEloquentProvider();
		$guard = new Guard($provider, App::make('session.store'));
		$guard->setCookieJar(App::make('cookie'));

		return $guard;
	}

	/**
	 * @return \Illuminate\Auth\EloquentUserProvider
	 */
	protected function createEloquentProvider()
	{
		$model = 'MadRambles\Models\User';

		return new EloquentUserProvider(App::make('hash'), $model);
	}
}
