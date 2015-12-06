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
        $images = Image::paginate(24);

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
