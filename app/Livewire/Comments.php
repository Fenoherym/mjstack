<?php

namespace App\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $article_id;
    
    protected $listeners = ['commentAdded' => '$refresh'];

    public function mount($articleId)
    {
        $this->article_id = $articleId;
    }

    public function render()
    {
        $comments = \App\Models\Comment::where('novus_post_id', $this->article_id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('livewire.comments', [
            'comments' => $comments
        ]);
    }
}
