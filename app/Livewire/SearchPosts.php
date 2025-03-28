<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
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
            $articles = Article::search($this->search)
                ->take(5)
                ->get();
        }

        return view('livewire.search-posts', [
            'searchResults' => $articles
        ]);
    }
}
