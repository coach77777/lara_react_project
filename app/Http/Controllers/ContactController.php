<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AdminContact(){

        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AddContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request){
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Contact::create($validatedData); // Eloquent will fill in created_at automatically

        return Redirect()->route('admin.contact')->with('success', 'Contact inserted successfully');
    }
    public function EditContact($id){
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function Contact() {
        $contacts = Contact::first(); // Uses Eloquent instead of DB::table()
        return view('pages.contact', compact('contacts'));
    }

     public function UpdateContact(Request $request, $id){
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Contact::find($id)->update($validatedData);

        return Redirect()->route('admin.contact')->with('success', 'Contact updated successfully');
}
    public function DeleteContact($id){
        Contact::find($id)->delete();
        return Redirect()->route('admin.contact')->with('success', 'Contact deleted successfully');
    }


    public function ContactForm(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactForm::create($validatedData); // Eloquent will fill in created_at automatically

        return Redirect()->route('contact')->with('success', 'Message sent successfully');
    }

    public function AdminMessage(){
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }
    public function DeleteMessage($id){
        ContactForm::find($id)->delete();
        return Redirect()->route('admin.message')->with('success', 'Message deleted successfully');
    }
}
