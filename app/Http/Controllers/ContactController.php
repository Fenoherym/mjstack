<?php

namespace App\Http\Controllers;

use App\Events\ContactFormSubmitted;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;

class ContactController extends Controller
{

    public function __construct(protected ContactService $contactService)
    {
       
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactRequest $request)
    {   
        $data = $request->validated();
        
        $this->contactService->handleSubmissionContactForm($data);
        
        return response()->json([
            'message' => "Votre message a bien été envoyé !", 
            'status' => 200                  
        ]);
    }
}
