<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/Admin/ContactAdminController.php
use App\Models\Contact;

class ContactAdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts', compact('contacts'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return back()->with('success','Pesan dihapus');
    }
}


