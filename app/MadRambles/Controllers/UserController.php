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
        return $this->users->all();
    }
}
