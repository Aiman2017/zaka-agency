<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Country;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::firstOrCreate([]);
        $countries = Country::query()->orderBy('id')->get();
        return view('front.contact', compact('contact', 'countries'));
    }

    public function send(ContactMessageRequest $request)
    {
        ContactMessage::create($request->safe()->except('consent'));

        return response()->json(['success' => true]);
    }
}
