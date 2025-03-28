@extends('layout.app')

@section('title')
    Accueil
@endsection

@section('content')
    <!-- Hero Section avec Code Typing -->
    <section class="pt-32 pb-16 px-4 bg-gradient-to-b from-blue-50 to-white dark:from-gray-800 dark:to-gray-900">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="text-left">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 dark:text-white">
                        Code, Apprends, <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Partage</span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                        Explorez le monde du développement web à travers mes articles et tutoriels.
                    </p>
                    <div class="relative max-w-xl">
                        <livewire:search-posts />
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-gray-900 dark:bg-gray-800 rounded-lg shadow-xl p-4 font-mono text-sm">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="text-gray-100">
                            <span id="typing-text"></span>
                            <span class="typing-cursor animate-pulse">|</span>
                        </div>
                    </div>
                    <div
                        class="absolute -z-10 top-10 right-10 w-full h-full bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg transform rotate-3">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    <section class="container mx-auto px-4 py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Derniers Articles</h2>
            <a href="{{ route('blog.index')}}" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 flex items-center gap-2">
                Voir tous les articles
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article
                    class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg card-scale border border-gray-100 dark:border-gray-700">
                    @if($post->featured_image)
                        <div class="relative h-56">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
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
                                <span
                                    class="text-sm px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                        <h2 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ $post->title }}</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                            <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                <span><i class="far fa-comment mr-1"></i> {{ $post->comments->count() }}</span>
                                <span><i class="far fa-eye mr-1"></i> {{ $post->getViewsCount() }}</span>
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
    </section>

    <!-- Latest YouTube Video -->
    <x-video-frame url="{{ $last_video->url }}" title="Ma dernière vidéo"> </x-video-frame>
    
    <!-- Tech Stack & Tools -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800/50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 dark:text-white mb-4">Technologies & Outils</h2>
            <p class="text-center text-gray-600 dark:text-gray-300 mb-12 max-w-2xl mx-auto">
                Voici les technologies et outils que j'utilise quotidiennement et que je recommande
            </p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="flex flex-col items-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:-translate-y-1">
                    <i class="fab fa-laravel text-5xl text-red-500 mb-4"></i>
                    <h3 class="font-semibold text-gray-900 dark:text-white">Laravel</h3>
                </div>
                <div class="flex flex-col items-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:-translate-y-1">
                    <i class="fab fa-vuejs text-5xl text-green-500 mb-4"></i>
                    <h3 class="font-semibold text-gray-900 dark:text-white">Vue.js</h3>
                </div>
                <div class="flex flex-col items-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:-translate-y-1">
                    <i class="fab fa-react text-5xl text-blue-400 mb-4"></i>
                    <h3 class="font-semibold text-gray-900 dark:text-white">React</h3>
                </div>
                <div class="flex flex-col items-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg transition-transform hover:-translate-y-1">
                    <svg class="w-12 h-12 mb-4 text-sky-500" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M12 6.036c-2.667 0-4.333 1.325-5 3.976 1-1.325 2.167-1.822 3.5-1.491.761.189 1.305.738 1.91 1.345 0.98.979 2.112 2.114 4.59 2.114 2.667 0 4.333-1.325 5-3.976-1 1.325-2.166 1.822-3.5 1.491-.761-.189-1.305-.738-1.91-1.345-.98-.979-2.112-2.114-4.59-2.114zM7 12.036c-2.667 0-4.333 1.325-5 3.976 1-1.326 2.167-1.822 3.5-1.491.761.189 1.305.738 1.91 1.345.98.979 2.112 2.114 4.59 2.114 2.667 0 4.333-1.325 5-3.976-1 1.325-2.166 1.822-3.5 1.491-.761-.189-1.305-.738-1.91-1.345-.98-.979-2.112-2.114-4.59-2.114z"/>
                    </svg>
                    <h3 class="font-semibold text-gray-900 dark:text-white">Tailwind CSS</h3>
                </div>
            </div>                
            </div>
        </div>
    </section>

    <!-- Les sections commentées restent en place -->
    {{-- <section class="container mx-auto px-4 py-12">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-8">Catégories Populaires</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#"
                class="group bg-gradient-to-br from-blue-500 to-purple-600 p-6 rounded-xl text-center text-white hover:shadow-lg transition-all">
                <i class="fas fa-code text-3xl mb-3"></i>
                <h3 class="font-semibold">Développement</h3>
            </a>
            <a href="#"
                class="group bg-gradient-to-br from-green-500 to-teal-600 p-6 rounded-xl text-center text-white hover:shadow-lg transition-all">
                <i class="fas fa-mobile-alt text-3xl mb-3"></i>
                <h3 class="font-semibold">Mobile</h3>
            </a>
            <a href="#"
                class="group bg-gradient-to-br from-red-500 to-pink-600 p-6 rounded-xl text-center text-white hover:shadow-lg transition-all">
                <i class="fas fa-video text-3xl mb-3"></i>
                <h3 class="font-semibold">Tutoriels</h3>
            </a>
            <a href="#"
                class="group bg-gradient-to-br from-yellow-500 to-orange-600 p-6 rounded-xl text-center text-white hover:shadow-lg transition-all">
                <i class="fas fa-lightbulb text-3xl mb-3"></i>
                <h3 class="font-semibold">Astuces</h3>
            </a>
        </div>
    </section> --}}


    {{-- <section class="bg-blue-50 dark:bg-gray-800/50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4">Restez informé</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-8">Abonnez-vous à ma newsletter pour recevoir mes derniers
                    articles et tutoriels.</p>
                <form class="flex flex-col md:flex-row gap-4 justify-center">
                    <input type="email" placeholder="Votre email" class="px-6 py-3 rounded-full md:w-96">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full transition-colors">
                        S'abonner
                    </button>
                </form>
            </div>
        </div>
    </section>


    <section class="py-16 bg-gradient-to-b from-transparent to-gray-50 dark:to-gray-800/50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 dark:text-blue-400">100+</div>
                    <div class="text-gray-600 dark:text-gray-300">Articles</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 dark:text-blue-400">50K+</div>
                    <div class="text-gray-600 dark:text-gray-300">Lecteurs</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 dark:text-blue-400">200+</div>
                    <div class="text-gray-600 dark:text-gray-300">Commentaires</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-blue-600 dark:text-blue-400">1K+</div>
                    <div class="text-gray-600 dark:text-gray-300">Abonnés</div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection

@section('partial-js')

@vite(['resources/js/codewritter.js']);
   
@endsection

@section('meta')
    <meta name="description" content="MJ Stack - Blog technique et tutoriels sur le développement web, Laravel, Vue.js, React et Tailwind CSS">
    <meta name="author" content="MJ Stack">
    <meta name="keywords" content="Laravel, Vue.js, React, Tailwind CSS, développement web, tutoriels">
@endsection