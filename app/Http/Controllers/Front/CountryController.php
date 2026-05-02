<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::where('is_active', true)->orderBy('sort_order')->get();

        return view('front.countries', compact('countries'));
    }
}
