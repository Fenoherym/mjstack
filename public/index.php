<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));



// Determine if the application is in maintenance mode...
if (file_exists($maintenance = dirname(__DIR__).'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require dirname(__DIR__).'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once dirname(__DIR__).'/bootstrap/app.php')
    ->handleRequest(Request::capture());


// <html lang="fr">
// <head>
//   <meta charset="UTF-8">
//   <title>Site en maintenance</title>
//   <style>
//     body {
//       text-align: center;
//       font-family: Arial, sans-serif;
//       padding: 50px;
//       background-color: #f3f3f3;
//     }
//     h1 {
//       color: #333;
//     }
//   </style>
// </head>
// <body>
//   <h1>Nous effectuons une maintenance</h1>
//   <p>Merci de revenir plus tard. Le site sera de nouveau accessible sous peu.</p>
// </body>
// </html>
