<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Laravel is a web application framework with expressive, elegant syntax.">
        <meta name="author" content="Laravel">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white">
        <div class="bg-gray-50 text-black dark:bg-black dark:text-white">
            <!-- Header -->
            <header class="py-10 text-center">
                <div class="flex justify-center">
                    <img src="https://laravel.com/assets/img/logomark.min.svg" alt="Logo Laravel" class="h-12 lg:h-16">
                </div>
                @if (Route::has('login'))
                    <nav class="mt-6 flex justify-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <!-- Main Content -->
            <main class="mt-6 text-center">
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    <a href="https://laravel.com/docs" class="block rounded-md p-4 bg-white dark:bg-gray-800 shadow hover:bg-gray-100 dark:hover:bg-gray-700">
                        <h2 class="text-xl font-semibold">Documentation</h2>
                        <p class="mt-2 text-sm">Laravel memiliki dokumentasi yang sangat baik mencakup setiap aspek framework.</p>
                    </a>
                    <a href="https://laracasts.com" class="block rounded-md p-4 bg-white dark:bg-gray-800 shadow hover:bg-gray-100 dark:hover:bg-gray-700">
                        <h2 class="text-xl font-semibold">Laracasts</h2>
                        <p class="mt-2 text-sm">Laracasts menawarkan ribuan video tutorial tentang Laravel, PHP, dan JavaScript.</p>
                    </a>
                    <a href="https://laravel-news.com" class="block rounded-md p-4 bg-white dark:bg-gray-800 shadow hover:bg-gray-100 dark:hover:bg-gray-700">
                        <h2 class="text-xl font-semibold">Laravel News</h2>
                        <p class="mt-2 text-sm">Portal dan newsletter untuk semua berita terbaru di ekosistem Laravel.</p>
                    </a>
                </div>
            </main>

            <!-- Footer -->
            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </body>
</html>
