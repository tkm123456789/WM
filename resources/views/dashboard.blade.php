@php
    use App\Models\Post;
    $posts = Post::all();
@endphp
<x-app-layout>


<body class="antialiased font-sans">
        <div class="min-h-screen bg-gray-100">

            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900">Welcome to WildMarket!</h2>
                </div>
                <div class="grid grid-cols-3 gap-4 mt-8">
                    @foreach($posts as $post)
                    <div class="bg-white aspect-square border-2 border-gray-400 rounded-lg text-center p-2">
                        <h1>{{ $post->title }}</h1>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-40 w-auto mx-auto mt-2 object-contain">
                        <span class="font-bold underline">Item Information</span>
                        <h3 class="font-bold">Price: ${{ $post->price }}</h3> 
                        <p>Description: {{ $post->description }}</p>
                        <a href="{{ route('post.show', $post->id) }}" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">See More Information</a>
                    </div>
                    @endforeach
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
</x-app-layout>
