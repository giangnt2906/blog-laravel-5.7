<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    //
    function index(){
        return view('backend.send_email');
    }

    function send(Request $request){
        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  'required|email',
            'message'   =>  'required'
        ]);

        $data = array(
            'name' => $request->name,
            'message' => $request->message
        );

        Mail::to('zeta.ntg2906@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'Email sent successfully');
    }
}
