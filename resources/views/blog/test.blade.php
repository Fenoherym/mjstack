@extends('layout.app')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <div
        class="p-6 sm:p-10 md:p-32 flex justify-center font-sans bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-md">
        <div class="w-full max-w-screen-xl mx-auto">
            <header class="mb-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-4">
                    <div class="flex flex-wrap items-center gap-2">
                        @foreach ($article->categories as $category)
                            <span
                                class="px-3 py-1 text-xs font-semibold rounded-full hover:opacity-90 transition-colors duration-300"
                                style="background-color: {{ $category->color }}; color: white;">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $article->publishedAtFormat() }} • 8 min de lecture
                    </div>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight dark:text-white">
                    Comment créer des interfaces responsives avec Tailwind CSS
                </h1>
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-6">
                    <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?..." alt="Author"
                        class="w-12 h-12 rounded-full object-cover border-2 border-primary-300 hover:border-primary-500 transition-all duration-300 transform hover:scale-110" />
                    <div>
                        <h3 class="font-medium dark:text-white">Thomas Dubois</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Développeur Front-end Senior</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach ($article->tags as $tag)
                        <span
                            class="px-2 py-1 text-xs bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer transition-colors duration-300">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                </div>
                <div class="relative h-64 sm:h-96 mb-8 overflow-hidden rounded-xl group">
                    <img src="{{ Storage::url($article->media->first()->path) }}" alt="Tailwind CSS development"
                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" />
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                        <p class="text-white text-base sm:text-lg md:text-xl font-medium">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                </div>
            </header>

            @if ($article->video)
                <div class="mb-8">
                    <x-video-frame url="{{ $article->video->url }}" title="{{ $article->video->title }}"
                        class="rounded-2xl overflow-hidden shadow-lg" />
                </div>
            @endif

            <main class="mb-12 dark:text-gray-200 prose dark:prose-invert max-w-none" x-data x-init="document.querySelectorAll('.prose img').forEach(img => {
                img.classList.add('mx-auto', 'rounded-2xl', 'shadow-xl', 'transition-all', 'duration-300', 'hover:shadow-2xl', 'hover:scale-[1.02]');
                img.style.maxWidth = '900px';
                img.style.width = '100%';
                img.style.height = 'auto';
                img.style.display = 'block';
                img.removeAttribute('width');
                img.removeAttribute('height');
                img.style.marginTop = '60px';
                img.style.marginBottom = '60px';
            });">
                {!! $article->content_html !!}
            </main>

            <section class="mb-12 border-t border-gray-200 dark:border-gray-700 pt-8">
                <h2 class="text-2xl font-bold mb-6 dark:text-white">Articles similaires</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ([1, 2, 3] as $index)
                        <div
                            class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                            <img src="..." alt="Article {{ $index }}" class="w-full h-48 object-cover" />
                            <div class="p-4">
                                <span
                                    class="px-2 py-1 text-xs bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-100 rounded">Catégorie</span>
                                <h3 class="font-bold mt-2 dark:text-white">Titre de l'article {{ $index }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Brève description ici</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="mb-12">
                <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-6 shadow-inner">
                    <livewire:comments :articleId="$article->id" />
                    <div class="mt-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                        <h3 class="font-bold text-lg mb-4 dark:text-white">Ajouter un commentaire</h3>
                        <div class="flex items-start space-x-3">
                            <livewire:comment-form :postId="$article->id" />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
