<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class Chat extends Component
{
    public $recipient = '';
    public $text = '';

    public function mount()
    {
        if (request()->has('recipient')) {
            $this->recipient = request()->get('recipient');
        }
    }

    public function send()
    {
        $message = Message::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $this->recipient,
            'text' => $this->text
        ]);

        $this->text = ''; // Clear the input after sending
    }

    public function getMessagesProperty()
    {
        if (!$this->recipient) return collect();
        
        return Message::where(function($query) {
            $query->where('sender_id', Auth::id())
                  ->where('recipient_id', $this->recipient);
        })->orWhere(function($query) {
            $query->where('sender_id', $this->recipient)
                  ->where('recipient_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.chat', [
            'users' => User::where('id', '!=', Auth::id())->get()
        ]);
    }
}
