<?php namespace MadRambles\Controllers;

use View;
use MadRambles\Repositories\UserRepositoryInterface;

class LoginController extends BaseController {

    /**
     * The user repository implementation.
     *
     * @param \MadRambles\Repositories\UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new instance.
     *
     * @param UserRepositoryInterface $users
     *
     * @return LoginController
     */
    public function __contruct(UserRepositoryInterface $users)
    {
        parent::__contruct();
        $this->beforeFilter('auth');
        $this->beforeFilter('csrf');

        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('admin.logins.login');
    }

    /**
     * Handles user login
     *
     * @return Response
     */
    public function store()
    {
        $email = mb_strtolower(Input::get('email'));
        $password = Input::get('password');

        if($this->users->login($email, $password))
        {
            return Redirect::route('admin.index');
        }

        return Redirect::back()
            ->withInput()
            ->with('login_errors', true);
    }

    /**
     * Log the user out
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        $this->auth->logout();
        return Redirect::route('admin.login');
    }
}
