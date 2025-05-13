<form class="flex-1" wire:submit="submitComment">
  
    <div class="mb-4">
        <input 
            type="text" 
            id="author_name" 
            wire:model="author_name"
            placeholder="Votre nom"
            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-primary-300 focus:border-primary-500 outline-none transition-all resize-none text-gray-900 dark:text-white"
        > 
        @error('author_name')
            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">                    
        <input 
            type="email" 
            id="author_email" 
            wire:model="author_email"
            placeholder="Votre email"
            class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-primary-300 focus:border-primary-500 outline-none transition-all resize-none text-gray-900 dark:text-white"
        > 
        @error('author_email')
            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <textarea
            wire:model="content"
            placeholder="Partagez votre avis sur cet article..."
            class="w-full h-32 p-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-primary-300 focus:border-primary-500 outline-none transition-all resize-none text-gray-900 dark:text-white"
        ></textarea>
        @error('content')
            <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-between items-center mt-3">                                        
        <button
            type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-primary-700 dark:hover:bg-primary-600 transition-colors font-medium"
        >
            <span wire:loading.remove>Publier</span>
            <span wire:loading>Envoi en cours...</span>
        </button>
    </div>
    
</form>
