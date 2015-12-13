<?php

namespace app\Helpers;

use App\Image as ImageModel;
use App\Helpers\Contracts\ImageContract;

class Image implements ImageContract
{
    /**
     * Get all images
     *
     * @param  string  $state image state, show|hide|new, default show
     * @return JSON
     */
    public function all($state = 'show')
    {
        $images = ImageModel::select('id', 'low_resolution')
                            ->whereStateOrderByCreatedTime($state)
                            ->simplePaginate(24);

        return $images;
    }

    /**
     * Get an image based on id.
     * 
     * @param  integer  $id image id
     * @param  string  $state image state, show|hide|new, default show
     * @return JSON
     */
    public function singular($id, $state = 'show')
    {
        $image = ImageModel::select('standard_resolution', 'caption_text', 'created_time')
                            ->where('id', '=', $id)
                            ->whereStateOrderByCreatedTime($state)
                            ->firstOrFail();

        // Get next/prev id
        $nextId = ImageModel::NextId($image->created_time, $state);
        $prevId = ImageModel::prevId($image->created_time, $state);
        $image->next = empty( $nextId->id ) ? 0 : $nextId->id;
        $image->prev = empty( $prevId->id ) ? 0 : $prevId->id;

        return $image;
    }
}