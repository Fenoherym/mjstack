<header class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm fixed w-full z-50 border-b border-gray-200 dark:border-gray-700">
    <div class="container mx-auto px-4 py-4">
        <nav class="flex flex-col md:flex-row items-center justify-between gap-4 md:gap-0">
            <div class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                <i class="fab fa-youtube mr-2"></i>  <a href="{{ route('home') }}">MJ Stack</a>
            </div>
            <div class="flex items-center space-x-4 md:space-x-6">
                <button id="theme-toggle" class="theme-toggle p-2 rounded-lg bg-gray-100 dark:bg-gray-700">
                    <i class="fas fa-sun text-yellow-500 dark:hidden"></i>
                    <i class="fas fa-moon text-blue-500 hidden dark:inline"></i>
                </button>
                <div class="flex space-x-4 md:space-x-6 text-sm md:text-base">
                    <a href="{{ route('home') }}" class="hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('home') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-700 dark:text-gray-300' }}">Accueil</a>
                    <a href="{{ route('blog.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('blog.*') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-700 dark:text-gray-300' }}">Blog</a>
                    <a href="https://fenohery-folio.netlify.app/" target="_blank" class="hover:text-blue-600 dark:hover:text-blue-400 text-gray-700 dark:text-gray-300">Portfolio</a>
                </div>
            </div>
        </nav>
    </div>
</header>
