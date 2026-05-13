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
            $adminEmail = Contact::value('email');
            if ($adminEmail) {
                Mail::to($adminEmail)->send(new NewContactMessage($message));
            } else {
                \Log::warning('Contact notification email skipped: no admin email configured in Contact Settings.');
            }
        } catch (\Exception $e) {
            \Log::warning('Contact notification email failed: ' . $e->getMessage());
        }

        return response()->json(['success' => true]);
    }
}
