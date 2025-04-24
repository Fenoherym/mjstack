<div>
    <section class="border-b border-gray-200 dark:border-gray-700">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-wrap items-center gap-4">                
                <div class="flex items-center gap-2">
                    <span class="text-gray-700 dark:text-gray-300">Trier par :</span>
                    <select wire:model.live="sortedBy" class="rounded-lg border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                        <option value="newest">Plus récent</option>
                        <option value="oldest">Plus ancien</option>
                        <option value="popular">Plus populaire</option>
                    </select>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-gray-700 dark:text-gray-300">Articles par page :</span>
                    <select wire:model.live="perPage" class="rounded-lg border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                        <option value="6" @if($perPage === 6) selected @endif>6</option>
                        <option value="2" @if($perPage === 2) selected @endif>2</option>
                        <option value="9" @if($perPage === 9) selected @endif>9</option>
                        <option value="12" @if($perPage === 12) selected @endif>12</option>
                        <option value="15" @if($perPage === 15) selected @endif>15</option>
                       
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Grid -->
    <main class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg card-scale border border-gray-100 dark:border-gray-700">
                    @if($post->featured_image)
                        <div class="relative h-56">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                alt="{{ $post->title }}"
                                class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm">
                                    {{ $post->published_at->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-4">
                            @foreach($post->tags as $tag)
                                <span class="text-sm px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                        <h2 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ $post->title }}</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                            <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                <span><i class="far fa-comment mr-1"></i> {{ $post->comments->count() }}</span>
                                <span><i class="far fa-eye mr-1"></i> {{ $post->views->count() }}</span>
                            </div>
                            <a href="{{ route('blog.show', $post) }}" 
                                class="inline-flex items-center space-x-2 text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">
                                <span>Lire la suite</span>
                                <i class="fas fa-arrow-right text-sm"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </main>
</div>
