<div>
    <body class="antialiased font-sans">
        <div class="min-h-screen bg-gray-100">
            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <form wire:submit.prevent="lookup" class="bg-white rounded-lg shadow-lg p-6 mb-8">
                    <div class="relative">
                        <input
                            wire:model="searchQuery"
                            class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200"
                            style="color: black; height: 40px; resize: none;"
                            placeholder="Search for posts..."
                        ></input>
                        <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>

                @if($searchResults)
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($searchResults as $post)
                            <div class="bg-gray-300 aspect-square border-2 border-gray-400 rounded-lg text-center p-2">
                                <h1>{{ $post->title }}</h1>
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-40 w-auto mx-auto mt-2 object-contain">
                                <span class="font-bold underline">Item Information</span>
                                <h3 class="font-bold">Price: ${{ $post->price }}</h3> 
                                <p>Description: {{ $post->description }}</p>
                                <a href="{{ route('post.show', $post->id) }}" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">See More Information</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </main>
        </div>
    </body>
</div>
