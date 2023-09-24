<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function AdminContact(){
        $contacts=Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function add() {
        $contacts=Contact::all();
        return view('admin.contact.create',compact('contacts'));
    }

    public function store(Request $request){
        $validate=$request->validate([
            'address'=>'required|min:5',
            'email'=>'required|email',
            'phone'=>'required',
        ]);

        Contact::create([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);

        
        notify()->success('Contact information added successfully !');
        return redirect()->route('contact.admin');
    }
    public function edit($id){
        $contacts=Contact::find($id);
        return view('admin.contact.edit',compact('contacts'));
    }

    public function update(Request $request,$id){
        Contact::find($id)->update([
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        notify()->success('Contact information updated successfully !');
        return redirect()->route('contact.admin');
    }

    public function delete($id){

        Contact::find($id)->delete();
        notify()->success('Contact field deleted successful!');
        return redirect()->route('contact.admin');
    }

    public function show(){
        $abouts=Contact::all();
        $adress=Contact::first();
       
        
        return view('page.contact',compact('abouts','adress'));
    }


    public function send(Request $request){

        ContactForm::create([
            'nom'=>$request->nom,
            'email'=>$request->email,
            'sujet'=>$request->sujet,
            'message'=>$request->message
        ]);

        Mail::to('abdo.bihi03@gmail.com')
        ->send(new ContactMail($request->except('_token')));
        notify()->success('Message was sent succesfuly!');
        return redirect()->route('contact');
    }
}
