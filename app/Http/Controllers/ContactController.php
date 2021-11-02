<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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

    public function Contact(){
      // $contacts = Contact::first();
      $contacts = DB::table('contacts')->first();
      //
      return view('pages.contact', compact('contacts'));
    }

    public function ContactForm(Request $request){
        ContactForm::insert([
          'name' => $request -> name,
          'email' => $request -> email,
          'subject' => $request -> subject,
          'message' => $request -> message,
          'created_at' => Carbon::now()
        ]);
        return Redirect()->back()-> with('success', 'Message Send Successfully');

    }

    public function AdminMessage(){
      $messages = ContactForm::all();
      return view('admin.contact.message', compact('messages'));
    }

    public function MessageDelete($id){
      ContactForm::find($id)->delete();

      return Redirect()->back()-> with('success', 'Message Delete Successfully');

    }

}
