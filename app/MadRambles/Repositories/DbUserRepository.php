<?php namespace MadRambles\Repositories;

use App, Auth, Hash, Validator, MadRambles;
use Illuminate\Auth\Guard;
use Illuminate\Auth\EloquentUserProvider;
use MadRambles\Models\User;

class DbUserRepository implements UserRepositoryInterface
{

  protected $auth;

  public function __construct()
  {
    $this->auth = $this->getMadRamblesAuth();
  }

  /**
   * Get all of the users.
   *
   * @return array
   */
  public function all()
  {
    return User::all();
  }

  /**
   * Log the user into the application.
   *
   * If the credentials are invalid, return false, else return true.
   *
   * @param string $email description
   * @param string $password description
   *
   * @return bool
   */
  public function login($email, $password)
  {
    $user = User::where('email', $email)->first();

    if($user && Hash::check($password, $user->password))
    {
        $this->auth->login($user, $password);

        return true;
    }

    // return false;
    return false;
  }

  public function getMadRamblesAuth()
  {
    $provider = $this->createEloquentProvider();

    $guard = new Guard($provider, App::make('session.store'));

    $guard->setCookieJar(App::make('cookie'));

    return $guard;
  }

  protected function createEloquentProvider()
  {
    $model = 'Wardrobe\Core\Models\User';

    return new EloquentUserProvider(App::make('hash'), $model);
  }
}
