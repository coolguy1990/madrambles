<?php namespace MadRambles\Controllers;

use View, Input, Redirect, Auth, DateTime;
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
        $data = array(
            'user_id' => Auth::user()->id,
            'title' => Input::get('title'),
            'slug' => Input::get('slug'),
            'content' => Input::get('content'),
            'excerpt' => Input::get('excerpt'),
            'publish_date' => new DateTime,
            'active' => Input::get('active')
        );

        $post = \MadRambles\Models\Post::create($data);

        $tag = new \MadRambles\Models\Tag;

        $tags = $tag->tagsFromString(Input::get('tags'));

        if(count($tags))
        {
            $tag->setTagsForPost($post->id, $tags);
        }

        return Redirect::to('admin/post');
    }

    public function show($id)
    {
        return View::make('layouts.admin.admin')
            ->with('body_class', 'admin article show')
            ->nest('nav', 'layouts.admin.nav')
            ->nest('content', 'admin.articles.show', [
                'post' => $this->posts->find($id)
            ]);
    }

    public function edit($id)
    {
        $post = $this->posts->find($id);
        $authors = \MadRambles\Models\User::all();

        if(!$post)
        {
            \App::abort(404);
        }

        $tags = [];
        foreach($post->tags as $tag)
        {
            $tags[] = $tag->name;
        }

        if (is_object($post))
        {
            return View::make('layouts.admin.admin')
                ->with('body_class', 'admin article edit')
                ->nest('nav', 'layouts.admin.nav')
                ->nest('content', 'admin.articles.edit', [
                    'post' => $post,
                    'post_tags' => $tags,
                    'post_tags_formatted' => implode(', ', $tags),
                    'authors' => $authors
                ]);
        }

        return \Redirect::to('admin');
    }

    public function update($id)
    {
        $post = $this->posts->find($id);

        $post->user_id = Input::get('user_id');
        $post->title = Input::get('title');
        $post->slug = Input::get('slug');
        $post->excerpt = Input::get('excerpt');
        $post->content = Input::get('content');
        $post->publish_date = new DateTime;
        $post->active = Input::get('active');

        $post->save();

        $tag = new \MadRambles\Models\Tag;

        $tags = $tag->tagsFromString(Input::get('tags'));

        if(count($tags))
        {
            $tag->setTagsForPost($post->id, $tags);
        }

        return Redirect::to('/admin/post/'.$id.'/edit');
    }
}
