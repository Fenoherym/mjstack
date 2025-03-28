<div>
    @if (session()->has('message'))
        <div class="p-4 mb-6 rounded-lg bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="submitComment" class="space-y-6">
        <div>
            <label for="author_name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
            <input type="text" id="author_name" wire:model="author_name"
                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
            @error('author_name')
                <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="author_email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" id="author_email" wire:model="author_email"
                   class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
            @error('author_email')
                <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="content" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Commentaire</label>
            <textarea id="content" wire:model="content" rows="4"
                      class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"></textarea>
            @error('content')
                <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" 
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                
                <span wire:loading.remove>Publier</span>
                <span wire:loading>Envoi encours...</span>
        </button>
    </form>
</div>
