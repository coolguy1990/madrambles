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
        return View::make('logins.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('logins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('logins.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('logins.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
