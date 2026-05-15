<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use App\Models\Service;
use App\Services\Front\HomeCardService;

class HomeController extends Controller
{
    public function index(HomeCardService $homeCardService)
    {
        $settings = HomeSetting::firstOrCreate([]);
        $service = Service::firstOrCreate([]);
        $services = $homeCardService->toHomeCards($service);

        return view('front.index', compact('settings', 'services'));
    }
}
