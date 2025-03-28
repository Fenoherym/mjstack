<div class="space-y-8">
    @foreach($comments as $comment)
        <div class="flex gap-4 p-6 rounded-xl bg-gray-50 dark:bg-gray-700/50">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                    <span class="text-blue-600 dark:text-blue-300 text-lg font-bold">
                        {{ substr($comment->author_name, 0, 1) }}
                    </span>
                </div>
            </div>
            <div class="flex-grow">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-semibold text-gray-900 dark:text-white">{{ $comment->author_name }}</h3>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                </div>
                <p class="text-gray-600 dark:text-gray-300">{{ $comment->content }}</p>
            </div>
        </div>
    @endforeach
</div>
