<div class="flex h-screen bg-white">
    <div class="w-64 bg-white border-r">
        <div class="p-4">
            <h2 class="text-lg font-semibold mb-4">Chats</h2>
            <div class="space-y-2">
                @foreach($users as $user)
                    <button wire:click="$set('recipient', {{ $user->id }})" class="w-full text-left p-2 hover:bg-gray-100 rounded {{ $recipient == $user->id ? 'bg-gray-100' : '' }}">
                        {{ $user->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
    <div class="flex-1 flex flex-col bg-gray-200">
        @foreach ($users as $user)
            @if ($recipient == $user->id)
                <div class="p-4 border-b bg-white">
                    <h2 class="text-lg font-semibold">Chat with {{ $user->name }}</h2>
                </div>
                <div class="flex-1 overflow-y-auto p-4 space-y-4">
                    @foreach($this->messages as $message)
                        <div class="flex {{ $message->sender_id == Auth::id() ? 'justify-end' : 'justify-start' }}">
                            <div class="max-w-[70%] rounded-lg p-3 {{ $message->sender_id == Auth::id() ? 'bg-blue-500 text-white' : 'bg-white' }}">
                                <p>{{ $message->text }}</p>
                                <span class="text-xs opacity-75">
                                    {{ $message->created_at->format('g:i A') }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="p-4 bg-white border-t">
                    <form wire:submit.prevent="send" class="flex gap-2">
                        <input 
                            type="text" 
                            wire:model="text" 
                            placeholder="Type your message..." 
                            class="flex-1 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        >
                        <button 
                            type="submit" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                        >
                            Send
                        </button>
                    </form>
                </div>
            @endif
        @endforeach
    </div>
</div>