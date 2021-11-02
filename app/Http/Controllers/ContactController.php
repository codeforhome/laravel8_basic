<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class ContactController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function AdminContact(){
      $contacts = Contact::all();
      return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact(){
      return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request){
        Contact::insert([
          'address' => $request -> address,
          'email' => $request -> email,
          'phone' => $request -> phone,
          'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.contact')-> with('success', 'Contact Inserted Successfully');
    }

    public function AdminEditContact($id){
      $contacts = Contact::find($id);
      return view('admin.contact.edit', compact('contacts'));
    }

    public function AdminUpdateContact(Request $request, $id){

        Contact::find($id)->update([
          'address' => $request -> address,
          'email' => $request -> email,
          'phone' => $request -> phone
        ]);
        return Redirect()->route('admin.contact')-> with('success', 'Contact Update Successfully');

    }

    public function AdminDeleteContact($id){
        $contacs = Contact::find($id)->delete();

        return Redirect()->back()-> with('success', 'Contact Delete Successfully');

    }

}
