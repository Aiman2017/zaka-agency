<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    private $settingKey = 'services_page';

    public function index()
    {
        // Получаем данные для страницы услуг
        $service = Service::query()->firstOrCreate()->fresh();

        return view('front.services', compact('service'));
    }
}
