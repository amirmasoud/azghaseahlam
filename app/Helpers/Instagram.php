<?php

namespace app\Helpers;

use App\Image;
use Carbon\Carbon;
use App\InstagramProfile;
use App\Helpers\Contracts\InstagramContract;


class Instagram implements InstagramContract
{
    /**
     * Generate recent media by a user url
     * @param  integer  $userId user id of target user or empty fot current user media
     * @return string
     */
    public function userRecentMediaURL($profileId = 'self')
    {
        $recentMedia = '/media/recent/?access_token=';

        return config('instagram.url') . $profileId . $recentMedia . config('instagram.access_token');
    }

    /**
     * Store images of a instagram profile for the first time.
     * @param  string  $url recent instagram url
     * @param  integer  $profileId instagram profile id of the owner
     * @return  string   command line message
     */
    public function store($url, $profileId)
    {
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
            // Current image
            $image = [];

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

        Image::insert($data);

        /**
         * Recursively run same function until reaching the point that
         * there is no other next_url in pagination array.
         */
        if (array_key_exists('next_url', $response['pagination']))
            $this->store($response['pagination']['next_url'], $profileId);

        // Count of inserted images.
        $imagesCount = Image::where('profile_id', '=', $profileId)->count('image_id');

        return PHP_EOL . $imagesCount . ' image(s) inserted for ' . $profileId . PHP_EOL;
    }

    /**
     * Update images of a created Instagram profile.
     * @param  string  $url recent Instagram url
     * @param  integer  $profileId instagram profile id of the owner
     * @return string  command line message
     */
    public function update($url, $profileId)
    {     
        // Get last fetched image's id by each profile
        $last_image_id = Image::orderBy('created_time', 'desc')
                                ->where('profile_id', '=', $profileId)
                                ->firstOrFail(['image_id'])
                                ->image_id;

        // Count of current images for given profile id before update.
        $imagesCountBeforeUpadate = Image::where('profile_id', '=', $profileId)->count('image_id');

        // when last image id met, updating state will change to false
        $updating = true;

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
            $this->create($response['pagination']['next_url']);

        // Count of current images for given profile id after updating.
        $imagesCountAfterUpdate = Image::where('profile_id', '=', $profileId)->count('image_id');

        // number of inserted images after update.
        $imagesCount = $imagesCountAfterUpdate - $imagesCountBeforeUpadate;

        // Profile name
        $profileName = InstagramProfile::whereProfileId($profileId)->firstOrFail()->name;

        return PHP_EOL . $imagesCount . ' image(s) inserted for ' . $profileId . ' -> ' . $profileName . PHP_EOL;
    }
}
