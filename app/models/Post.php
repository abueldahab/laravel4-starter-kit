<?php

use Illuminate\Support\Facades\URL; # not sure why i need this here :c

class Post extends Eloquent {

	public function content()
	{
		return nl2br($this->content);
	}

	/**
	 * Get the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the post's comments.
	 *
	 * @return array
	 */
	public function comments()
	{
		return $this->hasMany('Comment');
	}

	/**
	 * Get the date the post was created.
	 *
	 * @return string
	 */
	public function date()
	{
		return ExpressiveDate::make($this->created_at)->getRelativeDate();
	}

	/**
	 * Get the URL to the post.
	 *
	 * @return string
	 */
	public function url()
	{
		return Url::to($this->slug);
	}

	/**
	 * Returns the date of the blog post creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return ExpressiveDate::make($this->created_at)->getRelativeDate();
	}

	/**
	 * Returns the date of the blog post last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
		return ExpressiveDate::make($this->updated_at)->getRelativeDate();
	}

}
