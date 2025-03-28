<div class="relative">
    <div class="relative">
        <input 
            wire:model.live.debounce.300ms="search"
            type="text" 
            placeholder="Rechercher un article..." 
            class="w-full px-6 py-3 rounded-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent"
        >
        <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
            <i class="fas fa-search"></i>
        </button>
    </div>

    @if($showResults && $searchResults->isNotEmpty())
        <div class="absolute z-50 w-full mt-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 max-h-96 overflow-y-auto">
            @foreach($searchResults as $post)
                <a href="{{ route('blog.show', $post) }}" class="block p-4 hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-gray-100 dark:border-gray-700 last:border-0">
                    <h3 class="font-semibold text-gray-900 dark:text-white">{{ $post->title }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ Str::limit($post->excerpt, 100) }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        @foreach($post->tags as $tag)
                            <span class="text-xs px-2 py-1 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </a>
            @endforeach
        </div>
    @elseif($showResults && $search)
        <div class="absolute z-50 w-full mt-2 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
            <p class="text-gray-600 dark:text-gray-400">Aucun résultat trouvé pour "{{ $search }}"</p>
        </div>
    @endif
</div>
