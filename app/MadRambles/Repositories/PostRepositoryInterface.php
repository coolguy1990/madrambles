<?php namespace MadRambles\Repositories;

use DateTime;

interface PostRepositoryInterface
{
	/**
	 * Get all of the posts.
	 *
	 * @return array
	 */
	public function all();

	/**
	 * Get all the active posts.
	 *
	 * @param integer $per_page
	 *
	 * @return array
	 */
	//public function active($per_page);

	/**
	 * Get all posts with a tag
	 *
	 * @param string  $tag
	 * @param integer $per_page
	 *
	 * @return array
	 */
	//public function activeByTag($tag, $per_page);

	/**
	 * Get all the posts with a tag
	 *
	 * @param string   $tag
	 * @param integer  $per_page
	 *
	 * @return array
	 */
	//public function search($search, $per_page);

	/**
	 * Get a post by its primary key.
	 *
	 * @param integer $id
	 *
	 * @return Post
	 */
	public function find($id);

	/**
	 * Get a Post by its slug
	 *
	 * @param string  $slug
	 *
	 * @return Post
	 */
	//public function findBySlug($slug);

	/**
	 * Create a new slug
	 *
	 * @param string 	$title
     * @param string    $content
     * @param string    $slug
     * @param string     $tags
     * @param bool      $active
     * @param integer   $user_id
     * @param DateTime  $publish_date
     *
     * @return Post
	 */
    public function create($title, $content, $slug, $tags, $active, $user_id, DateTime $publish_date);

    /**
     * Update a post
     *
     * @param integer   $int
     * @param string    $title
     * @param string    $content
     * @param string    $slug
     * @param array     $tags
     * @param bool      $active
     * @param integer   $user_id
     * @param DateTime  $publish_date
     *
     * @return Post
     */
    //public function update($id, $title, $content, $slug, array $tags, $active, $user_id, DateTime $publish_date);

    /**
     * Delete the post with given ID.
     *
     * @param integer $id
     *
     * @return void
     */
    //public function delete($id);

    /**
     * Get a list of all the tags used by the blog
     *
     * @return array
     */
    //public function allTags();

    /**
     * Determine if the given post is valid for creating
     *
     * @param string $title
     * @param string $slug
     *
     * @return \Illuminate\Support\MessageBad
     */
    public function validForCreation($title, $slug);

    /**
     * Determine if given post is valid for updating
     *
     * @param string    $title
     * @param string    $slug
     * @param integer   $id
     *
     * @return \Illuminate\Support\MessageBag
     */
    //public function validForUpdate($id, $title, $slug);
}
