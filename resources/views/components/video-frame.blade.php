<section class="bg-gray-50 dark:bg-gray-800/50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center">
                {{ $title }}
            </h2>
            <div class="relative pb-[56.25%] h-0 rounded-2xl overflow-hidden shadow-xl">
                <iframe class="absolute top-0 left-0 w-full h-full" src="{{ $url }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="text-center mt-6">
                <a href="https://www.youtube.com/@mj-stack" target="_blank"
                    class="inline-flex items-center gap-2 text-red-600 hover:text-red-700">
                    <i class="fab fa-youtube text-2xl"></i>
                    <span>Rejoignez-moi sur YouTube</span>
                </a>
            </div>
        </div>
    </div>
</section>