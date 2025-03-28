<div>
    <form wire:wire:submit.prevent="submitComment">
        @csrf
        <div class="mb-6">
            <label 
                for="name" 
                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300"                  
            >
                Nom
            </label>
            <input 
                type="text" 
                id="name"                
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                wire:model="author_name"
            >
        </div>
        <div class="mb-6">
            <label 
                for="email" 
                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300"
            >
                Email
            </label>
            <input 
                type="email" 
                id="email"  
                required
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                wire:model="author_email"
                >
        </div>
        <div class="mb-6">
            <label 
                for="comment" 
                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300"
            >
               Commentaire
            </label>
            <textarea 
                id="comment"
                rows="4" required              
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                wire:model="content"
                ></textarea>
        </div>
        <button type="submit" 
                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
            Publier le commentaire
        </button>
    </form>
</div>
