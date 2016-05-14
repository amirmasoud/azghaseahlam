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
        return view('angular');
    }
}
