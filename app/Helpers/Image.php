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
        $images = ImageModel::select('id', 'standard_resolution', 'low_resolution', 'caption_text', 'link')
                            ->orderBy('id', 'desc')
                            ->simplePaginate(24);

        /**
         * Add next/prev image id
         */
        foreach ($images as $image) {
            $nextId = ImageModel::NextId($image->id);
            $prevId = ImageModel::prevId($image->id);
            $image->next = is_int( $nextId ) ? $nextId : 0;
            $image->prev = is_int( $prevId ) ? $prevId : 0;
        }

        return $images;
    }

}