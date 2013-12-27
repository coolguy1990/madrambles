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
}
