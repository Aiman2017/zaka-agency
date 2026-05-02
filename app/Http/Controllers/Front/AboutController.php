<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;


class AboutController extends Controller
{
    
    public function index()
    {

        $about = About::firstOrCreate([]);
        return view('front.about', compact('about'));
    }
}
