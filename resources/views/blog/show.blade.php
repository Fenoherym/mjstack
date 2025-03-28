@extends('layout.app')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
<div class="container pt-32 mx-auto px-4 py-8">
    <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
        @if($article->featured_image)
            <div class="relative h-96">
                <img src="{{ Storage::url($article->featured_image) }}" 
                     alt="{{ $article->title }}"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
            </div>
        @endif
        
        <div class="p-8">
            <!-- Article Meta -->
            <div class="flex flex-wrap items-center gap-4 mb-6 text-sm text-gray-600 dark:text-gray-400">
                <span class="flex items-center">
                    <i class="far fa-calendar mr-2"></i>
                    @if ($article->published_at !== null)
                        {{ $article->published_at->format('d M Y') }}
                    
                    @else
                    {{ $article->created_at->format('d M Y') }}
                    @endif
                </span>
                <span class="flex items-center">
                    <i class="far fa-eye mr-2"></i>
                    {{ $article->getViewsCount() ?? 0 }} vues
                </span>
                <span class="flex items-center">
                    <i class="far fa-comment mr-2"></i>
                    {{ $article->comments->count() }} commentaires
                </span>
            </div>

            <!-- Tags -->
            <div class="flex flex-wrap gap-2 mb-6">
                @foreach($article->tags as $tag)
                    <span class="px-3 py-1 text-sm rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>

            <!-- Title -->
            <h1 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">{{ $article->title }}</h1>
            
            <x-video-frame url="{{ $article->video->url }}" title="{{ $article->video->title }}"> </x-video-frame>
        </section>    
        
            <!-- Content -->
            <div class="prose dark:prose-invert max-w-none mb-12" x-data x-init="
                document.querySelectorAll('.prose img').forEach(img => {
                    img.classList.add('mx-auto', 'rounded-lg', 'shadow-lg');
                    img.style.maxWidth = '768px';
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
            <div class="flex items-center gap-4 py-6 border-t border-gray-200 dark:border-gray-700">
                <span class="text-gray-700 dark:text-gray-300">Partager :</span>
                <a href="#" class="text-blue-500 hover:text-blue-600 dark:text-blue-400">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="text-blue-700 hover:text-blue-800 dark:text-blue-400">
                    <i class="fab fa-facebook text-xl"></i>
                </a>
                <a href="#" class="text-green-600 hover:text-green-700 dark:text-green-400">
                    <i class="fab fa-whatsapp text-xl"></i>
                </a>
            </div>
        </div>
    </article>

    <!-- Comments Section -->
    <div class="mt-12 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
        <h2 class="text-2xl font-bold mb-8 text-gray-900 dark:text-white">Commentaires</h2>

        <!-- Comment Form -->
        <livewire:comment-form :postId="$article->id" />

        <!-- Comments List -->
        <div class="mt-8">
            <livewire:comments :articleId="$article->id" />
        </div>
    </div>
</div>
@endsection

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($article->excerpt), 160) }}">
    <meta name="author" content="MJ Stack">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($article->excerpt), 160) }}">
    @if($article->featured_image)
    <meta property="og:image" content="{{ asset('storage/' . $article->featured_image) }}">
    @endif
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $article->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($article->excerpt), 160) }}">
    @if($article->featured_image)
    <meta name="twitter:image" content="{{ asset('storage/' . $article->featured_image) }}">
    @endif
@endsection