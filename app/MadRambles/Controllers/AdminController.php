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
        //dd(\Auth::user());
        return View::make('layouts.admin.admin')
            ->with('body_class', 'admin article')
            ->nest('nav', 'layouts.admin.nav')
            ->nest('content', 'admin.articles', [
                'articles' => $this->posts->all()
            ]);

    }
}
