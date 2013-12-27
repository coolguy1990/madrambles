<?php namespace MadRambles\Controllers;

use View;
use MadRambles\Repositories\PostRepositoryInterface;

class AdminController extends BaseController {

    /**
     * The Post repository implementation.
     *
     * @var MadRambles\Repositories\PostRepositoryInterface
     */
    protected $posts;

    /**
     * AdminController constructor
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->beforeFilter('auth');

        $this->posts = $posts;
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {

        //return $this->posts->all();
        return View::make('layouts.admin.admin')
            ->with('body_class', 'admin article')
            ->nest('nav', 'layouts.admin.nav')
            ->nest('content', 'admin.articles', [
                'articles' => $this->posts->all()
            ]);

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        return View::make('admins.create');
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
        return View::make('admins.show');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        return View::make('admins.edit');
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
