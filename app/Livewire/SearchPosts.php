<?php

namespace App\Livewire;

use Livewire\Component;
use Shah\Novus\Models\Post;
use Livewire\WithPagination;

class SearchPosts extends Component
{
    use WithPagination;

    public $search = '';
    public $showResults = false;

    protected $queryString = ['search'];

    public function updatedSearch()
    {
        $this->showResults = strlen($this->search) > 2;
    }

    public function render()
    {
        $articles = [];
        
        if (strlen($this->search) > 2) {
                $articles = Post::where('status', 2)
                ->where(function ($query) {
                    $query->where('title', 'like', "%{$this->search}%")
                        ->orWhere('content', 'like', "%{$this->search}%")
                        ->orWhereHas('tags', function ($q) {
                            $q->where('name', 'like', "%{$this->search}%");
                        })
                        ->orWhereHas('categories', function ($q) {
                            $q->where('name', 'like', "%{$this->search}%");
                        });
                })
                ->take(5)
                ->get();

        }

        return view('livewire.search-posts', [
            'searchResults' => $articles
        ]);
    }
}
