<?php

namespace app\Helpers;

use App\Image as ImageModel;
use App\Helpers\Contracts\ImageContract;

class Image implements ImageContract
{
    /**
     * Get all images
     * @return JSON
     */
    public function get()
    {
        $images = ImageModel::select('id', 'low_resolution')
                            ->where('state', '=', 'show')
                            ->orderBy('created_time', 'desc')
                            ->simplePaginate(24);

        return $images;
    }

    /**
     * Get an image based on id
     * @param  integer  $id image id
     * @return JSON
     */
    public function singular($id)
    {
        $image = ImageModel::select('id', 'standard_resolution', 'low_resolution', 'caption_text', 'link')
                            ->where('id', '=', $id)
                            ->firstOrFail();

        // Get next/prev id
        $nextId = ImageModel::NextId($image->id);
        $prevId = ImageModel::prevId($image->id);
        $image->next = is_int( $nextId ) ? $nextId : 0;
        $image->prev = is_int( $prevId ) ? $prevId : 0;

        return $image;
    }
}