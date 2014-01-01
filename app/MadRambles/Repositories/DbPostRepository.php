<?php namespace MadRambles\Repositories;

use Config, Cache, DateTime, Validator;
use MadRambles\Models\Post;
use MadRambles\Models\Tag;

class DbPostRepository implements PostRepositoryInterface
{

    /**
    * Display all the posts
    *
    * @return Response
    */
    public function all()
    {
        return Post::with(array('tags', 'user'))->orderBy('publish_date', 'desc')->get();
    }

    /**
    * Get a post by its id
    *
    * @param integer $id
    *
    * @return Post
    */
    public function find($id)
    {
        return Post::with(array('tags', 'user'))->findOrFail($id);
    }

    /**
    * Create a new post
    *
    * @param string $title
    * @param string $content
    * @param string $slug
    * @param string  $postTags
    * @param boolean $active
    * @param integer $user_id
    * @param DateTime $publish_date
    *
    * @return Post
    */
    public function create($title, $content, $slug, $postTags, $active, $user_id, DateTime $publish_date)
    {
        $post = Post::create(compact('title', 'content', 'slug', 'active', 'user_id', 'publish_date'));

        $tag = new Tag;
        $tags = $tag->tagsFromString($postTags);

        if (count($tags))
        {
            $tag->setTagsForPost($post->id, $tags);
        }

        return $post;
    }

    /**
    * Prepare an array of tags for database
    *
    * @param array $tags
    *
    * @return array
    */
    protected function prepareTags(array $tags)
    {
        $results = array();

        foreach ($tags as $tag)
        {
            $results[] = compact('tag');
        }

        return $results;
    }

    /**
    * Determine if the given post is valid for creation
    *
    * @param string $title
    * @param string $slug
    *
    * @return \Illuminate\Support\MessageBag
    */
    public function validForCreation($title, $slug)
    {
        return $this->validatePost($title, $slug);
    }

    /**
    * Determine if given post is valid
    *
    * @param string $title
    * @param string $slug
    * @param integer $id
    *
    * @return \Illuminate\Support\MessageBag
    */
    protected function validatePost($title, $slug, $id = null)
    {
        $rules = array(
          'title' => 'required',
          'slug'  => 'required|unique:posts,slug'
        );

        if ($id)
        {
            $rules['slug'] .= ','.$id;
        }

        $validator = Validator::make(compact('title', 'slug'), $rules)->fails();

        return $validator->errors();
    }
}
