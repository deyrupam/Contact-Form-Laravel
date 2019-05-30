<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }
    public function store(Request $request){


        $this->validate($request,[
         'name'=>'required',
         'email'=>'required|email',
         'subject'=>'required',

        ]);
        Mail::send('email.contact-message',[

            'msg' => $request->subject,'contactPerson'=>$request->name ],
            function ($mail) use ($request) {
                $mail->from($request->email,$request->name) ;
                 $mail->to('rupam@example.com')->subject('New Contact message');
            });

            $emailContact = new Contact;

            $emailContact->name = $request->name;
            $emailContact->email = $request->email;
            $emailContact->subject = $request->subject;

            $emailContact->save();

            return redirect()->back()->with('flash_message','Thank for your message.');


     }

}
