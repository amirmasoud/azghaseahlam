<?php

namespace app\Helpers\Logics;

use App\Image;
use Carbon\Carbon;

trait InstagramLogic {
	/**
	 * When last image id has been met, updating state will change to false
	 * 
	 * @var boolean
	 */
	public static $updating = false;

    /**
     * Generate recent media by a user url.
     * 
     * @param  integer  $userId user id of target user or empty fot current user media
     * @return string
     */
    public function userRecentMediaURL($profileId = 'self')
    {
        $recentMedia = '/media/recent/?access_token=';

        return config('instagram.url') . $profileId . $recentMedia . config('instagram.access_token');
    }

    /**
     * If there is no image for this profile id return not found.
     * 
     * @param  integer $profileId
     * @return boolean
     */
    public function virginProfile($profileId) 
    {
        if (! Image::where('profile_id', '=', $profileId)->count()) {
            return true;
        } else {
        	return false;
        }
    }

    /**
     * Get last fetched image by profile id.
     *
     * @param  integer $profileId
     * @return collection
     */
    public function lastFetchedImageId($profileId) 
    {
		return Image::orderBy('created_time', 'desc')
				    ->where('profile_id', '=', $profileId)
				    ->first(['image_id']);
    }

    /**
     * If profile id not found
     * 
     * @param  collection $last_image
     * @return array
     */
    public function profileNotFound($last_image, $profileId)
    {
        if (is_null($last_image))
            return [$profileId, 'Not found', 'Not found'];
    }

    public function updateImages($profileId, $url, $last_image_id)
    {
        static $updating = true;

        // Get associative arrays.
        $response = json_decode(file_get_contents($url), true);

        /**
         * Each response contains 20 new images
         * every new images first save in this
         * array and then will insert to DB.
         * 
         * @var array
         */
        $data = [];

        foreach ($response['data'] as $resData) {
            /**
             * If last image id met break update proccess and 
             * set updating to false in order to jump next
             * page proccessing.
             */
            if ($last_image_id == $resData['id']) {
                $updating = false;
                break;
            }

            /**
             * To initialize created_at and updated_at in bulk
             * insertion created_at and updated_at 
             * not working out of the box.
             * 
             * @var DateTime
             */
            $now = Carbon::now();
            
            $image['updated_at']            = $now;
            $image['created_at']            = $now;
            $image['profile_id']            = $profileId;
            $image['image_id']              = $resData['id'];
            $image['link']                  = $resData['link'];
            $image['caption_text']          = $resData['caption']['text'];
            $image['thumbnail']             = $resData['images']['thumbnail']['url'];
            $image['low_resolution']        = $resData['images']['low_resolution']['url'];
            $image['standard_resolution']   = $resData['images']['standard_resolution']['url'];
            $image['created_time']          = Carbon::createFromTimestamp($resData['caption']['created_time']);

            // add current image to buck insertion array
            $data[] = $image;
        }

        $result = Image::insert($data);

        /**
         * Recursively run same function until reaching the point that
         * there is no other next_url in pagination array or updating
         * is finished and updatin state sat to false.
         */
        if (array_key_exists('next_url', $response['pagination']) && $updating)
            $this->updateImages($response['pagination']['next_url']);
    }
}