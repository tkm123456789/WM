<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]
class Search extends Component
{

    public $searchResults = null;
    public $searchQuery = null;
    public function lookup()
    {
        if (empty($this->searchQuery)) {
            $this->searchResults = null;
            return;
        }

        $this->searchResults = Post::where('title', 'like', '%' . $this->searchQuery . '%')
            ->orWhere('content', 'like', '%' . $this->searchQuery . '%')
            ->with('user')
            ->latest()
            ->get();
    }
    public function render()
    {
        return view('livewire.search');
    }
}
