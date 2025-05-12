@extends('layout.app')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
<div class="container pt-32 mx-auto px-4 py-8 max-w-5xl">
    <article class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
        @if($article->featured_image)
            <div class="relative h-[500px]">
                <img src="{{ Storage::url($article->featured_image) }}" 
                     alt="{{ $article->title }}"
                     class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            </div>
        @endif
        
        <div class="p-10">
            <!-- Tags -->
            <div class="flex flex-wrap gap-2 mb-8">
                @foreach($article->tags as $tag)
                    <span class="px-4 py-1.5 text-sm font-medium rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300 transition-colors duration-200 hover:bg-blue-200 dark:hover:bg-blue-900">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>

            <!-- Title -->
            <h1 class="text-5xl font-bold mb-8 text-gray-900 dark:text-white leading-tight">{{ $article->title }}</h1>

            <!-- Article Meta -->
            <div class="flex flex-wrap items-center gap-6 mb-8 text-sm text-gray-600 dark:text-gray-400">
                <span class="flex items-center transition-colors duration-200 hover:text-blue-500">
                    <i class="far fa-calendar mr-2"></i>
                    @if ($article->published_at !== null)
                        {{ $article->published_at->format('d M Y') }}
                    @else
                        {{ $article->created_at->format('d M Y') }}
                    @endif
                </span>
                {{-- <span class="flex items-center transition-colors duration-200 hover:text-blue-500">
                    <i class="far fa-eye mr-2"></i>
                    {{ $article->getViewsCount() ?? 0 }} vues
                </span>
                <span class="flex items-center transition-colors duration-200 hover:text-blue-500">
                    <i class="far fa-comment mr-2"></i>
                    {{ $article->comments->count() }} commentaires
                </span> --}}
            </div>

            @if ($article->video)
                <div class="mb-8">
                    <x-video-frame url="{{ $article->video->url }}" title="{{ $article->video->title  }}" class="rounded-2xl overflow-hidden shadow-lg"> </x-video-frame>
                </div>
            @endif

            <!-- Content -->
            <div class="prose dark:prose-invert max-w-none mb-12 text-lg leading-relaxed" x-data x-init="
                document.querySelectorAll('.prose img').forEach(img => {
                    img.classList.add('mx-auto', 'rounded-2xl', 'shadow-xl', 'transition-all', 'duration-300', 'hover:shadow-2xl', 'hover:scale-[1.02]');
                    img.style.maxWidth = '900px';
                    img.style.width = '100%';
                    img.style.height = 'auto';
                    img.style.display = 'block';
                    img.removeAttribute('width');
                    img.removeAttribute('height');
                })
            ">
                {!! $article->content !!}
            </div>

            <!-- Share Buttons -->
            {{--
            <div class="flex items-center gap-6 py-8 border-t border-gray-200 dark:border-gray-700">
                <span class="text-gray-700 dark:text-gray-300 font-medium">Partager :</span>
                <a href="#" class="text-2xl text-blue-500 hover:text-blue-600 dark:text-blue-400 transition-colors duration-200 hover:scale-110 transform">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-2xl text-blue-700 hover:text-blue-800 dark:text-blue-400 transition-colors duration-200 hover:scale-110 transform">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="text-2xl text-green-600 hover:text-green-700 dark:text-green-400 transition-colors duration-200 hover:scale-110 transform">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
            --}}
        </div>
    </article>

    <!-- Comments Section -->
    <div class="mt-16 bg-white dark:bg-gray-800 rounded-3xl shadow-xl p-10">
        <h2 class="text-3xl font-bold mb-10 text-gray-900 dark:text-white">Commentaires</h2>

        <!-- Comment Form -->
        <livewire:comment-form :postId="$article->id" />

        <!-- Comments List -->
        <div class="mt-8">
            <livewire:comments :articleId="$article->id" />
        </div>
    </div>
</div>
@endsection