<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;
class FilterPost extends Component
{
    use WithPagination;
    public $sortedBy = "newest";
    public $perPage = 6;
    protected $queryString = ['sortedBy'];

    public function updatedSortedBy() 
    {
        $this->resetPage();
    }
    public function render()
    {
        $posts = [];
        switch ($this->sortedBy) {
            case 'oldest':
                $posts = Article::where('is_published', true) 
                ->orderBy('published_at', 'asc')
                ->paginate($this->perPage);
                ;
                break;
            case 'popular':
                $posts = Article::where('is_published', true) 
                ->withCount('views')->orderBy('views_count', 'desc')
                ->paginate($this->perPage);
                ;
                break;        
            default:
                $posts = Article::where('is_published', true) 
                ->orderBy('published_at', 'desc')
                ->paginate($this->perPage);
                break;
            }
      
        return view('livewire.filter-post', compact('posts'));
    }
}
