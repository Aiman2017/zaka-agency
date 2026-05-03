<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contact::firstOrCreate([])->fresh();

        return view('back.contact.edit', compact('contact'));
    }

    public function update(ContactRequest $request)
    {
        $contact = Contact::firstOrCreate([]);
        $contact->update($request->validated());

        return redirect()->back()->with('success', 'Contact information updated successfully.');
    }

    // ── Dedicated inbox ──────────────────────────────────────────────────────
    public function messages(Request $request)
    {
        $filter = $request->get('filter', 'all');

        $query = ContactMessage::latest();
        if ($filter === 'unread') $query->where('is_read', false);
        if ($filter === 'read')   $query->where('is_read', true);

        $messages = $query->paginate(20)->withQueryString();

        $stats       = ContactMessage::selectRaw('COUNT(*) as total, SUM(is_read = 0) as unread')->first();
        $totalCount  = (int) $stats->total;
        $unreadCount = (int) $stats->unread;

        return view('back.contact.messages', compact('messages', 'totalCount', 'unreadCount', 'filter'));
    }

    public function markAllRead()
    {
        ContactMessage::where('is_read', false)->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    // ── Per-message ───────────────────────────────────────────────────────────
    public function markRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function destroyMessage(ContactMessage $message)
    {
        abort_unless(auth()->user()?->isSuperAdmin(), 403);

        $message->delete();

        return response()->json(['success' => true]);
    }
}
