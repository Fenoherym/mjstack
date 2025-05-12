<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentForm extends Component
{
    public $author_name = "";
    public $author_email = "";
    public $content = "";
    public $article_id;

    protected $rules = [
        'author_name' => 'required|min:3',
        'author_email' => 'required|email',
        'content' => 'required|min:5',
    ];

    protected $messages = [
        'author_name.required' => 'Le nom est requis',
        'author_name.min' => 'Le nom doit contenir au moins 3 caractères',
        'author_email.required' => 'L\'email est requis',
        'author_email.email' => 'L\'email doit être valide',
        'content.required' => 'Le commentaire est requis',
        'content.min' => 'Le commentaire doit contenir au moins 5 caractères',
    ];
    
    public function mount($postId)
    {
        $this->article_id = $postId;        
    }
    
    public function submitComment()
    {
        $validatedData = $this->validate();
        
        Comment::create([
            'novus_post_id' => $this->article_id,
            'author_name' => $this->author_name,
            'author_email' => $this->author_email,
            'content' => $this->content,
        ]);

        $this->reset(['author_name', 'author_email', 'content']);
        
        $this->dispatch('commentAdded');
        
        session()->flash('message', 'Commentaire ajouté avec succès!');
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
