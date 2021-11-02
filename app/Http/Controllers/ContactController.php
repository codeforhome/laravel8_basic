<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function AdminContact(){
      $contacts = Contact::all();
      return view('admin.contact.index', compact('contacts'));
    }
}
