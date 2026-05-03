<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessageRequest;
use App\Mail\NewContactMessage;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Country;
use Illuminate\Support\Facades\Mail;

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
        $message = ContactMessage::create($request->safe()->except('consent'));

        try {
            $adminEmail = optional(Contact::first())->email ?? config('mail.from.address');
            Mail::to($adminEmail)->send(new NewContactMessage($message));
        } catch (\Exception $e) {
            \Log::warning('Contact notification email failed: ' . $e->getMessage());
        }

        return response()->json(['success' => true]);
    }
}
