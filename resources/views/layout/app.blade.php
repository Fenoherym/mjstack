<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MJ STACK | @yield('title')</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    @yield('meta')

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- Reste du head -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism-themes/1.9.0/themes/prism-dracula.min.css" rel="stylesheet">
    
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" rel="stylesheet"> --}}
    <!-- Un autre thème pour tester -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script> --}}

        <!-- CSS pour le thème sombre (Monokai par exemple) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/monokai.min.css" rel="stylesheet">
    <!-- JavaScript de Highlight.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    


    
</head>

@livewireStyles

<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-200">

    @include('components.header')

    @yield('content')

    @include('components.footer')

    <!-- Back to top button -->
    <button id="backToTop" 
            class="fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-blue-700">
        <i class="fas fa-arrow-up"></i>
    </button>

    @yield('partial-js')
    
    @livewireScripts
</body>

</html>