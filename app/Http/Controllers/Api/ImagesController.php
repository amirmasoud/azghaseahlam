<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Contracts\ImageContract;

class ImagesController extends Controller
{
    public function get(ImageContract $images)
    {
    	return $images->get();
    }
}
