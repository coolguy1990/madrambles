<?php namespace MadRambles\Controllers;

use View, Input;
use Carbon\Carbon;

use MadRambles\Repositories\PostRepositoryInterface;

class PostController extends BaseController {

    /**
     * The Post repository implementation.
     *
     * @var MadRambles\Repositories\PostRepositoryInterface
     */
    protected $posts;

    /**
     * PostController constructor
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->beforeFilter('auth');

        $this->posts = $posts;
    }

    public function index()
    {
        return 'boo';
    }

    /**
     * Display the form for creating a new post
     *
     * @return Response
     */
    public function create()
    {
        $author = \MadRambles\Models\User::all();

        return View::make('layouts.admin.admin')
            ->with('body_class', 'admin article create')
            ->nest('nav', 'layouts.admin.nav')
            ->nest('content', 'admin.articles.create', [
                'input' => \Session::getOldInput(),
                'author' => $author
            ]);
    }

    public function store()
    {
        // $message = $this->posts->validForCreation(Input::get('title'), Input::get('slug'));

        // if (count($message) > 0)
        // {
        //     return Response::json($message->all(), 400);
        // }

        $data = array(
            'user_id' => \Auth::user()->id,
            'title' => Input::get('title'),
            'slug' => Input::get('slug'),
            'content' => Input::get('content'),
            'excerpt' => Input::get('excerpt'),
            'publish_date' => new \DateTime,
            'active' => Input::get('active')
        );

        $post = \MadRambles\Models\Post::create($data);

        $tag = new \MadRambles\Models\Tag;

        $tags = $tag->tagsFromString(Input::get('tags'));

        //if(count(tags))
        //{
            $tag->setTagsForPost($post->id, $tags);
        //}

        return \Redirect::to('admin/post');
    }

































}
