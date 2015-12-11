<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	/**
	 * variable that can be mass assigned.
     * 
	 * @var array
	 */
	protected $fillable = [
		'link',
		'low_resolution',
        'thumbnail',
		'standard_resolution',
		'caption_text',
		'profile_id',
		'image_id',
		'created_time',
		'state',
	];

	/**
	 * An image is owned by a instagram profile.
	 * 
	 * @return belongTo
	 */
	public function instagramProfile()
	{
		return $this->belongsTo('App\InstagramProfile', 'profile_id', 'profile_id');
	}

    /**
     * Scope a query to get next image id.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopeNextId($query, $id)
	{
		return $query->where('id', '>', $id)->min('id');
	}

    /**
     * Scope a query to get prev image id.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopePrevId($query, $id)
	{
		$query = $query->where('id', '<', $id);
		return $query->max('id');
	}
}
