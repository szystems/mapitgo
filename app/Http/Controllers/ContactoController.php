<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use sisVentasWeb\Contact;
use Illuminate\Support\Facades\Redirect;
use sisVentasWeb\Http\Requests\ContactFormRequest;
use DB;
use sisVentasWeb\User;
use sisVentasWeb\Mail\ClientMessage;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(Request $request)
    {
        return view('vistas.vcontacto.index');
    }

    public function store (ContactFormRequest $request)
    {
        

        $name = $request->get("name");
        $email = $request->get("email");
        $phone = $request->get("phone");
        $subject = $request->get("subject");
        $messages = $request->get("messages");

        

        
        $emailcompany = env('MAIL_USERNAME');
        Mail::to($emailcompany)->send(new ClientMessage($name,$email,$phone,$subject,$messages));
        $request->session()->flash('alert-success', 'The message was sent, in the next few hours a manager will be contacted to solve your doubts.');
        return view('vistas.vcontacto.index');

    }
}
