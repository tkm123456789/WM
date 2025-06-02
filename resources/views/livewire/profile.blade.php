@php
    use App\Models\Post;
    $posts = Post::all();
@endphp
<body class="antialiased font-sans">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">My Posts</h2>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($posts as $post)
                        @if ($post->user_id == Auth::user()->id)
                            <div class="bg-gray-300 aspect-square border-2 border-gray-400 rounded-lg text-center p-2">
                                <h1>{{ $post->title }}</h1>
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-40 w-auto mx-auto mt-2 object-contain">
                                <span class="font-bold underline">Item Information</span>
                                <h3 class="font-bold">Price: ${{ $post->price }}</h3> 
                                <p>Description: {{ $post->description }}</p>
                                <button type="button" wire:click="deletepost({{ $post->id }})" style="background: rgb(180, 21, 21); color:black; border-radius: 5px; cursor: pointer;">Delete Post</button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</body>
