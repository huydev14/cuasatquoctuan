<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalContacts = Contact::count();
        $unreadContacts = Contact::where('status', false)->count();
        $recentContacts = Contact::latest()->limit(5)->get();

        return view('admin.dashboard', compact('totalContacts', 'unreadContacts', 'recentContacts'));
    }

    public function contacts()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function updateContactStatus(Request $request, Contact $contact)
    {
        $contact->update(['status' => $request->boolean('status')]);
        return back()->with('success', 'Cập nhật trạng thái thành công');
    }
}
