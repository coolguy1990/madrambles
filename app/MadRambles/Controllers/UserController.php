<?php namespace MadRambles\Controllers;

use View, Auth;
use MadRambles\Repositories\UserRepositoryInterface;

class UserController extends BaseController {

    /**
     * The user repository implementation.
     *
     * @var MarRambles\Repositories\UserRepositoryInterface
     */
    protected $users;

    /**
     * Instanstiate the contructor
     *
     * @param UserRepositoryInterface $users
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;

        $this->beforeFilter('auth');
    }

    /**
     * Display all Users
     *
     * @return Response
     */
    public function index()
    {
        return View::make('layouts.admin.admin')
            ->with('body_class', 'admin article')
            ->nest('nav', 'layouts.admin.nav')
            ->nest('content', 'admin.users', [
                'users' => $this->users->all()
            ]);
    }

    /**
     * Display a particular user
     *
     * @return Reponse
     */
    public function show($id)
    {
        return View::make('layouts.admin.admin')
            ->with('body_class', 'admin article')
            ->nest('nav', 'layouts.admin.nav')
            ->nest('content', 'admin.user', [
                'user' => $this->users->find($id)
            ]);
    }
}
