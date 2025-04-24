<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactRequest $request)
    {   
        Mail::to('fenoherysaiyan@gmail.com')
        ->send(new ContactMail(
            $request->name, 
            $request->email, 
            $request->message
        ));
        
        return response()->json([
            'message' => "Votre message a bien été envoyé !", 
            'status' => 200
                  
        ]);
    }
}
