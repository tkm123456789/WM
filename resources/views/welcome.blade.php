<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
    <div class="min-h-screen bg-gray-100">
            <header class="bg-wildcat shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-4">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('storage/wildmarketlogo-removebg-preview.png') }}" alt="WildMarket Logo" class="h-10 w-auto">
                            <h1 class="text-2xl font-bold text-white">WildMarket</h1>
                        </div>
                        <div>
                            @if (Route::has('login'))
                                <livewire:welcome.navigation />
                            @endif
                        </div>
                    </div>
                </div>
            </header>
    
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center space-y-4">
            <h2 class="text-4xl font-bold text-gray-900">Welcome to WildMarket!</h2>
            <p class="text-xl text-gray-600">Your campus marketplace for buying and selling items</p>
            <div class="mt-6 space-y-2">
                <p class="text-lg text-gray-700">Find great deals from your fellow students or sell your unused items</p>
                <p class="text-lg text-gray-700">Join our community today!</p>
            </div>
        </div>

        @guest
            <div class="mt-12 text-center">
                <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Get Started
                </a>
            </div>
        @endguest
    </main>
    </div>
    </body>
</html>
