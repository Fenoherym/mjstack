<?php

use App\Mail\ContactMail;
use Shah\Novus\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [BlogController::class, 'index'])->name('blog.index');
Route::get('/articles/{article:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/fun', function() {
    return view('fun.index');
})->name('fun');

Route::get('/blog/nuvos', function() {
   $post = Post::where('id', 1)
    ->with(['media', 'tags', 'categories', 'comments'])
    ->first();  

   
    return view('blog.test', ["article" => $post]);
}); 

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Cache cleared!';
});

// Route::get('/run-migration', function() {
//     $exitCode = Artisan::call('migrate', [
//         '--force' => true, // Force l'exécution en production
//     ]);

//     // Vérifie si l'exécution a réussi ou s'il n'y a pas de migration
//     $output = Artisan::output();

//     if (strpos($output, 'Nothing to migrate') !== false) {
//         return "Aucune migration a effectué";
//     }

//     // Si le code de sortie est 0, cela signifie que les migrations se sont bien effectuées
//     if ($exitCode === 0) {
//         return "Migrations exécutées avec succès";
//     }

//     return "erreur"; 
// });

// Route::get('/test-email', function () {
    
//     // $data = ['message' => 'Ceci est un email de test'];
//     try {
//         Mail::to('fenoherysaiyan@gmail.com')->send(new ContactMail(
//             "Rakotoniana Fenohery",
//             "nasandratrafrancia29@gmail.com",
//             "Ceci est un test d'envoi d'email depuis Laravel avec contact mail"
//         ));

//         return '✅ Email envoyé avec succès !';
//     } catch (\Exception $e) {
//         // Enregistre l’erreur dans le log
//         Log::error('Erreur lors de l’envoi de l’email : ' . $e->getMessage());

//         // Retourne un message d’erreur lisible
//         return '❌ Une erreur est survenue : ' . $e->getMessage();
//     }
//     // Mail::raw('Ceci est un test d\'envoi d\'email depuis Laravel', function($message) {
//     //     $message->to('fenoherysaiyan@gmail.com')
//     //             ->subject('Test Email Laravel');
//     // });

   
// });

// Route::get('/run-storage-link', function () {
//     // Optionnel : protège l'accès (ex : avec une clé secrète)
//     // abort_unless(request()->has('key') && request('key') === 'ma-cle-secrete', 403);

//     Artisan::call('storage:link');

//     return '✅ storage:link a été exécuté avec succès !';
// });

// Route::get('/create-storage-link', function () {
//     // sécurité (à adapter)
//     // abort_unless(request('key') === 'ma-cle-secrete', 403);

//     $publicPath = base_path('../public_html/storage'); // <- car ton public_html est à côté
//     $targetPath = base_path('storage/app/public');

//     if (!file_exists($publicPath)) {
//         symlink($targetPath, $publicPath);
//         return 'Lien symbolique créé avec succès.';
//     }

//     return 'Le lien existe déjà.';
// });


// Route::get('/test-upload', function () {
//     $content = file_get_contents(dirname(dirname(__DIR__)) . '/public_html/favicon/favicon.ico');


// ;
//     // Modifie le chemin pour pointer vers public_html

//     Storage::disk('images_public_html')->put('test.png', $content);
//     return 'Fichier sauvegardé.';
// });

