<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]

class Profile extends Component
{
    
    public function deletepost($id)
    {
        Post::findOrFail($id)->delete();
        //session()->flash('message', 'Post deleted');
    }
    public function render()
    {
        return view('livewire.profile');
    }
}
