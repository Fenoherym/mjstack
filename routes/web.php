<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles', [BlogController::class, 'index'])->name('blog.index');
Route::get('/articles/{article:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/test-email', function () {
    $data = ['message' => 'Ceci est un email de test'];
    
    Mail::raw('Ceci est un test d\'envoi d\'email depuis Laravel', function($message) {
        $message->to('fenoherysaiyan@gmail.com')
                ->subject('Test Email Laravel');
    });

    return 'Email envoyé !';
});
