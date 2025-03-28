<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $author_name = "";
    public $author_email = "";
    public $content = "";

    protected $rules = [

    ];
    
    public function render()
    {
        return view('livewire.contact-form');
    }
}
