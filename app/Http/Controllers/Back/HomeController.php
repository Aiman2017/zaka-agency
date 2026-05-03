<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Country;
use App\Models\GalleryItem;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $msgStats  = ContactMessage::selectRaw('COUNT(*) as total, SUM(is_read = 0) as unread')->first();
        $postStats = Post::selectRaw('COUNT(*) as total, SUM(is_published = 1) as published')->first();

        return view('back.index', [
            'messagesCount'  => (int) $msgStats->total,
            'unreadCount'    => (int) $msgStats->unread,
            'postsCount'     => (int) $postStats->total,
            'publishedCount' => (int) $postStats->published,
            'countriesCount' => Country::count(),
            'galleryCount'   => GalleryItem::count(),
        ]);
    }
}
