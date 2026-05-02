<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;

class GalleryController extends Controller
{
    
    public function index()
    {
        // Получаем все элементы, отсортированные по порядку
        $items = GalleryItem::orderBy('sort_order', 'asc')->get();

        // Получаем только те страны, которые реально есть в базе для фильтров
        $countries = GalleryItem::select('country')
            ->distinct()
            ->pluck('country');


          

        return view('front.gallery', compact('items', 'countries'));
    }
}
