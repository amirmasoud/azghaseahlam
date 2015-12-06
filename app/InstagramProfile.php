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
     * An Instagram Profile can have many Photos.
     * 
     * @return HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photos', 'instagram_profile_token', 'token');
    }
}
