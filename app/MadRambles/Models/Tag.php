<?php namespace MadRambles\Models;

use MadRambles\Models\PostTag;

class Tag extends \Eloquent {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'url_name');

	/**
	 *
	 * Post Relationship
	 *
	 * @return Relationship
	 */
	public function posts()
	{
		return $this->belongsToMany('MadRambles\Models\Post');
	}

	public function setTagsForPost($post_id, array $tags, $delete_first = true)
	{
		if($delete_first)
		{
			\DB::table('post_tag')->where('post_id', $post_id)->delete();
		}

		foreach ($tags as $tag)
		{
			$this->addTagForPost($post_id, $tag);
		}

		return $this;
	}

	public function addTagForPost($post_id, $tag)
	{
		$foundTag = Tag::where('name', $tag)->first();

		if (count($foundTag) === 0)
		{
			$foundTag = Tag::create(array(
				'name' => $tag,
				'url_name' => $this->urlFriendly($tag)
			));
		}

		PostTag::create(array(
				'post_id' => $post_id,
				'tag_id' => $foundTag->id
			));

		return $this;
	}

	protected function urlFriendly($string)
	{
		return str_replace(' ', '-', strtolower(trim($string)));
	}

	public function tagsFromString($tags)
	{
		$unformattedTags = trim($tags);

		if (strlen($unformattedTags) > 0)
		{
			$formattedTags = str_replace(', ', ',', $unformattedTags);
			$tags = explode(',', $formattedTags);
		}

		return $tags;
	}
}
