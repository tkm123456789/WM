<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $post->title }} - WildMarket</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
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
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg">
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
                            <p class="text-2xl font-bold text-wildcat mb-4">${{ $post->price }}</p>
                            
                            <div class="space-y-4">
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-700">Description</h2>
                                    <p class="text-gray-600">{{ $post->description }}</p>
                                </div>
                                
                                <div class="mt-6 pt-6 border-t border-gray-200">
                                    <h2 class="text-xl font-bold text-gray-800 underline mb-4">Seller Information</h2>
                                    @php
                                        use App\Models\User;
                                        $user = User::findOrFail($post->user_id);
                                    @endphp
                                    <div class="space-y-2">
                                        <p class="text-gray-700 font-medium">Name: <span class="text-gray-900">{{ $user->name }}</span></p>
                                        <p class="text-gray-700 font-medium">Location: <span class="text-gray-900">{{ $user->location }}</span></p>
                                        <p class="text-gray-700 font-medium">Contact: <span class="text-gray-900">{{ $user->email }}</span></p>
                                        @if(Auth::id() !== $user->id)
                                            <a href="{{ route('chat') }}?recipient={{ $user->id }}" 
                                               class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Chat with Seller
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <a href="/dashboard" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                    Back to Listings
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="bg-white shadow-sm mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <p class="text-center text-sm text-gray-500">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>