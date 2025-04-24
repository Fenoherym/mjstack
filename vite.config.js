import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',               
                'resources/js/app.js',
                'resources/js/codewritter.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public_html/build', // Spécifie où les fichiers sont générés
        manifest: true,  // Génère le fichier manifest.json
    },
});
