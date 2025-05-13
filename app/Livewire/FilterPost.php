<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Shah\Novus\Models\Post;
use Livewire\WithPagination;

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
                $posts = Post::where('status', 2)
                ->orderBy('published_at', 'asc')
                ->paginate($this->perPage);
                ;
                break;              
            default:
                $posts = Post::where('status', 2)
                ->orderBy('published_at', 'desc')
                ->paginate($this->perPage);
                break;
            }
      
        return view('livewire.filter-post', compact('posts'));
    }
}
