@extends('layout.app')

@section('title')
    {{ $article->title }}
@endsection

@section('content')       
<div class="md:p-32 p-6 flex justify-center font-sans bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-md">
    <div class="max-w-[1200px]">
        <header class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 text-xs font-semibold bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-200 rounded-full hover:bg-primary-200 dark:hover:bg-primary-800 transition-colors duration-300">Technologie</span>
                        <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200 rounded-full hover:bg-blue-200 dark:hover:bg-blue-800 transition-colors duration-300">Design</span>
                        <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-200 rounded-full hover:bg-green-200 dark:hover:bg-green-800 transition-colors duration-300">UX/UI</span>
                    </div>
                </div>
                <div class="mt-3 md:mt-0">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Publié le 15 Mai 2023 • 8 min de lecture</div>
                </div>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight dark:text-white">
                Comment créer des interfaces responsives avec Tailwind CSS
            </h1>
            <div class="flex items-center space-x-4 mb-6">
                <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?..." alt="Author" class="w-12 h-12 rounded-full object-cover border-2 border-primary-300 hover:border-primary-500 transition-all duration-300 transform hover:scale-110" />
                <div>
                    <h3 class="font-medium dark:text-white">Thomas Dubois</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Développeur Front-end Senior</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 mb-6">
                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer transition-colors duration-300">#TailwindCSS</span>
                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer transition-colors duration-300">#ResponsiveDesign</span>
                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer transition-colors duration-300">#FrontEnd</span>
                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer transition-colors duration-300">#WebDevelopment</span>
                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100 rounded hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer transition-colors duration-300">#CSS</span>
            </div>
            <div class="relative h-[400px] mb-8 overflow-hidden rounded-xl group">
                <img src="{{ Storage::url($article->media->first()->path) }}" alt="Tailwind CSS development" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" />
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                    <p class="text-white text-lg md:text-xl font-medium">
                        Découvrez comment Tailwind CSS révolutionne le développement d'interfaces responsives
                    </p>
                </div>
            </div>
        </header>
        <main class="mb-12 dark:text-gray-200">
            {!! $article->content_html !!}
        </main>
        <section class="mb-12 border-t border-gray-200 dark:border-gray-700 pt-8">
            <h2 class="text-2xl font-bold mb-6 dark:text-white">Articles similaires</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                    <img src="..." alt="CSS Grid Layout" class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <span class="px-2 py-1 text-xs bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-100 rounded">CSS</span>
                        <h3 class="font-bold mt-2 dark:text-white">Maîtriser CSS Grid Layout</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Apprenez à créer des mises en page complexes facilement
                        </p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                    <img src="..." alt="JavaScript Frameworks" class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-100 rounded">JavaScript</span>
                        <h3 class="font-bold mt-2 dark:text-white">Comparaison des frameworks JS en 2023</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">React vs Vue vs Angular : lequel choisir ?</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1">
                    <img src="..." alt="Accessibility" class="w-full h-48 object-cover" />
                    <div class="p-4">
                        <span class="px-2 py-1 text-xs bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100 rounded">Accessibilité</span>
                        <h3 class="font-bold mt-2 dark:text-white">L'importance de l'accessibilité web</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Comment rendre vos sites accessibles à tous</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-12">
            <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-6 shadow-inner">
                <livewire:comments :articleId="$article->id" />
                <div class="mt-8"></div>
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