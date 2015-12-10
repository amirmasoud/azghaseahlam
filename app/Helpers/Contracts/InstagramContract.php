<?php

namespace App\Helpers\Contracts;

Interface InstagramContract
{
	/**
	 * Generate recent media by a user url
	 * @param  integer  $userId user id of target user or empty fot current user media
	 * @return string
	 */
	public function userRecentMediaURL($userId = 'self');

    /**
     * Store images of a instagram profile for the first time.
     * @param  string  $url recent instagram url
     * @param  integer  $profile_id instagram profile id of the owner
     * @return  string   command line message
     */
	public function store($url, $profile_id);

    /**
     * Update images of a created Instagram profile.
     * @param  string  $url recent Instagram url
     * @param  integer  $profile_id instagram profile id of the owner
     * @return string  command line message
     */
	public function update($url, $profile_id);
}