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
     * @param  string  $state image state, show|hide|new, default show
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopeNextId($query, $created_time, $state)
	{
		return $query->where('created_time', '>', $created_time)
					 ->WhereStateOrderByCreatedTime($state)
					 ->first(['id']);
	}

    /**
     * Scope a query to get prev image id.
     *
     * @param  string  $state image state, show|hide|new, default show
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopePrevId($query, $created_time, $state)
	{
		return $query->where('created_time', '<', $created_time)
					 ->WhereStateOrderByCreatedTime($state)
					 ->first(['id']);
	}

    /**
     * Scope a query to get by state and order.
     *
     * @param  string  $state image state, show|hide|new, default show
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopeWhereStateOrderByCreatedTime($query, $state)
	{
		return $query->where('state', '=', $state)
					 ->orderBy('created_time', 'desc');
	}
}
