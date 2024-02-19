<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.components.contacts', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->email = $request->email;
        $contact->save(); 

        return redirect()->back();
    }
}
