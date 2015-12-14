<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Contracts\ImageContract;

class ThemeController extends Controller
{
    /**
     * Get home page
     * @return  view
     */
    public function home(ImageContract $images)
    {
        $images = $images->get();

        return view('theme.4-cols-portfolio', compact('images'));
    }
}
