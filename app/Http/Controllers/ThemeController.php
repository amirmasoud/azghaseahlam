<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    /**
     * Get home page
     * @return  view
     */
    public function home()
    {
        $images = Image::select('id', 'standard_resolution', 'low_resolution', 'caption_text', 'link')->orderBy('id', 'desc')->simplePaginate(4);
        foreach ($images as $image) {
            $nextId = Image::NextId($image->id);
            $prevId = Image::prevId($image->id);
            $image->next = is_int( $nextId ) ? $nextId : 0;
            $image->prev = is_int( $prevId ) ? $prevId : 0;
        }

        return view('theme.4-cols-portfolio', compact('images'));
    }

    /**
     * Get about page
     * @return  view
     */
    public function about()
    {
        return 'new page';
    }

    /**
     * Get contact page
     * @return  view
     */
    public function contact()
    {
        return 'new page';
    }
}
