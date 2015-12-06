<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramProfile extends Model
{
	/**
	 * variable that can be mass assigned.
     * 
	 * @var array
	 */
	protected $fillable = [
		'name',
		'token',
	];

    /**
     * An Instagram Profile can have many images.
     * 
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Image', 'instagram_profile_token', 'token');
    }
}
