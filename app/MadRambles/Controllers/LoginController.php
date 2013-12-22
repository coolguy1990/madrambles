<?php namespace MadRambles\Controllers;

use View, Input, Auth, Redirect;
use MadRambles\Repositories\UserRepositoryInterface;

class LoginController extends BaseController {

    /**
     * The user repository implementation.
     *
     * @param \MadRambles\Repositories\UserRepositoryInterface
     */
    public $users;

    /**
     * Create a new instance.
     *
     * @param UserRepositoryInterface $users
     *
     * @return LoginController
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //return View::make('admin.login');
        return View::make('layouts.admin.admin')
            ->with('body_class', 'admin login')
            ->nest('nav', 'layouts.admin.navlogin')
            ->nest('content', 'admin.login');
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

        //$u = new \MadRambles\Repositories\DbUserRepository;
        //dd($email);

        if($this->users->login($email, $password))
        {
            //dd($email);
            return Redirect::route('admin.index');
        }

        // if(Auth::attempt(['email' => $email, 'password' => $password]))
        // {
        //     return Redirect::route('admin.index');
        // }

        return Redirect::back()
            ->withInput()
            ->with('auth_error', 'Invalid Credentials');
    }

    /**
     * Log the user out
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        Auth::logout();
        return Redirect::to('/admin/login');
    }
}
