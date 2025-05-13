<div>
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Commentaires ({{ $comments->count() }})</h2>
    <div class="space-y-6 mt-6">
        @foreach($comments as $comment)
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                <div class="flex items-start space-x-3">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <h4 class="font-medium text-gray-900 dark:text-white">{{ $comment->author_name }}</h4>
                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <p class="mt-2 text-gray-700 dark:text-gray-300">
                            {{ $comment->content }}
                        </p>             
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
