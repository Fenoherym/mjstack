<?php

namespace App\Services;

use App\Events\ContactFormSubmitted;
use App\Models\Contact;

class ContactService {
    
    /**
     * 
     * Handle the submission of the contact form.
     */
    
    public function handleSubmissionContactForm(array $data)
    {
        Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);
        
        
        event(new ContactFormSubmitted(
            $data['name'],
            $data['email'],
            $data['message'],
        ));
    }

}