<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $messagesCount = ContactMessage::count();
        $unreadCount   = ContactMessage::where('is_read', false)->count();

        return view('back.index', compact('messagesCount', 'unreadCount'));
    }
}
