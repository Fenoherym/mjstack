@extends('layout.app')

@section('title')
    {{ $article->title }}
@endsection

@section('content')       
            <div class="md:p-32 p-6 flex justify-center font-sans bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-md">
                <div class="max-w-[1200px]">

                    <header class="mb-8">
                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="px-3 py-1 text-xs font-semibold bg-primary-100 text-primary-700 rounded-full hover:bg-primary-200 transition-colors duration-300"
                                    >
                                        Technologie
                                    </span>
                                    <span
                                        class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full hover:bg-blue-200 transition-colors duration-300"
                                    >
                                        Design
                                    </span>
                                    <span
                                        class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full hover:bg-green-200 transition-colors duration-300"
                                    >
                                        UX/UI
                                    </span>
                                </div>
                            </div>
                            <div class="mt-3 md:mt-0">
                                <div class="text-sm text-gray-500">Publié le 15 Mai 2023 • 8 min de lecture</div>
                            </div>
                        </div>
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 leading-tight">
                            Comment créer des interfaces responsives avec Tailwind CSS
                        </h1>
                        <div class="flex items-center space-x-4 mb-6">
                            <img
                                src="https://images.unsplash.com/photo-1455390582262-044cdead277a?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3w3MzkyNDZ8MHwxfHNlYXJjaHwxfHxhdXRob3J8ZW58MHx8fHwxNzQ3MDA4MjQxfDA&amp;ixlib=rb-4.1.0&amp;q=80&amp;w=1080"
                                alt="Author"
                                class="w-12 h-12 rounded-full object-cover border-2 border-primary-300 hover:border-primary-500 transition-all duration-300 transform hover:scale-110"
                                keywords="author, profile, avatar"
                            />
                            <div>
                                <h3 class="font-medium">Thomas Dubois</h3>
                                <p class="text-sm text-gray-600">Développeur Front-end Senior</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span
                                class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded hover:bg-gray-200 cursor-pointer transition-colors duration-300"
                                >#TailwindCSS</span
                            >
                            <span
                                class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded hover:bg-gray-200 cursor-pointer transition-colors duration-300"
                                >#ResponsiveDesign</span
                            >
                            <span
                                class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded hover:bg-gray-200 cursor-pointer transition-colors duration-300"
                                >#FrontEnd</span
                            >
                            <span
                                class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded hover:bg-gray-200 cursor-pointer transition-colors duration-300"
                                >#WebDevelopment</span
                            >
                            <span
                                class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded hover:bg-gray-200 cursor-pointer transition-colors duration-300"
                                >#CSS</span
                            >
                        </div>
                        <div class="relative h-[400px] mb-8 overflow-hidden rounded-xl group">
                            <img
                                src="{{ asset('storage/' .$article->media->first()->path) }}"
                                alt="Tailwind CSS development"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700"
                                keywords="responsive design, tailwind css, web development, coding"
                            />
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                                <p class="text-white text-lg md:text-xl font-medium">
                                    Découvrez comment Tailwind CSS révolutionne le développement d&#x27;interfaces
                                    responsives
                                </p>
                            </div>
                        </div>
                    </header>
                    <main class="mb-12">
                        {!! $article->content_html !!}
                    </main>
                    <section class="mb-12 border-t border-gray-200 pt-8">
                        <h2 class="text-2xl font-bold mb-6">Articles similaires</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div
                                class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1"
                            >
                                <img
                                    src="https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=80"
                                    alt="CSS Grid Layout"
                                    class="w-full h-48 object-cover"
                                    keywords="css grid, layout design, web development"
                                />
                                <div class="p-4">
                                    <span class="px-2 py-1 text-xs bg-purple-100 text-purple-800 rounded">CSS</span>
                                    <h3 class="font-bold mt-2">Maîtriser CSS Grid Layout</h3>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Apprenez à créer des mises en page complexes facilement
                                    </p>
                                </div>
                            </div>
                            <div
                                class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1"
                            >
                                <img
                                    src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=80"
                                    alt="JavaScript Frameworks"
                                    class="w-full h-48 object-cover"
                                    keywords="javascript, react, vue, frameworks"
                                />
                                <div class="p-4">
                                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">JavaScript</span>
                                    <h3 class="font-bold mt-2">Comparaison des frameworks JS en 2023</h3>
                                    <p class="text-sm text-gray-600 mt-1">React vs Vue vs Angular : lequel choisir ?</p>
                                </div>
                            </div>
                            <div
                                class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1"
                            >
                                <img
                                    src="https://images.unsplash.com/photo-1627398242454-45a1465c2479?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=80"
                                    alt="Accessibility"
                                    class="w-full h-48 object-cover"
                                    keywords="accessibility, a11y, web standards"
                                />
                                <div class="p-4">
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Accessibilité</span>
                                    <h3 class="font-bold mt-2">L&#x27;importance de l&#x27;accessibilité web</h3>
                                    <p class="text-sm text-gray-600 mt-1">Comment rendre vos sites accessibles à tous</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="mb-12">
                        <div class="bg-gray-50 rounded-xl p-6 shadow-inner">
                            <h2 class="text-2xl font-bold mb-6">Commentaires (8)</h2>
                           
                            <livewire:comments :articleId="$article->id" />                         
                            
                            <div class="mt-8"></div>
                            <div class="mt-8 bg-white p-6 rounded-lg shadow-sm">
                                <h3 class="font-bold text-lg mb-4">Ajouter un commentaire</h3>
                                <div class="flex items-start space-x-3">
                                   
                                    <livewire:comment-form :postId="$article->id" />
                                </div>
                            </div>
                        </div>
                    </section>          
                </div>
        
            </div>
@endsection