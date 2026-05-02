<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function edit()
    {
        $contact  = Contact::firstOrCreate([])->fresh();
        $messages = ContactMessage::latest()->get();

        return view('back.contact.edit', compact('contact', 'messages'));
    }

    public function update(ContactRequest $request)
    {
        $contact = Contact::firstOrCreate([]);
        $contact->update($request->validated());

        return redirect()->back()->with('success', 'Contact information updated successfully.');
    }

    public function markRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function destroyMessage(ContactMessage $message)
    {
        $message->delete();

        return response()->json(['success' => true]);
    }
}
