@extends('layout.app')

@section('title')
    Blog - Tous les Articles
@endsection

@section('meta')
    <meta name="description" content="Découvrez les derniers articles et tutoriels sur le développement web, Laravel, Vue.js, React et plus encore.">
    <meta name="author" content="MJ Stack">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="pt-32 pb-16 px-4 bg-gradient-to-b from-blue-50 to-white dark:from-gray-800 dark:to-gray-900">
        <div class="container mx-auto">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 dark:text-white">
                    Blog
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                    Découvrez tous mes articles sur le développement web, les bonnes pratiques et les nouvelles technologies.
                </p>
                <div class="max-w-xl mx-auto">
                    <livewire:search-posts />
                </div>
            </div>
        </div>
    </section>
    
    <livewire:filter-post />
@endsection