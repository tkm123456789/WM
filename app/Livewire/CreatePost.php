<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class CreatePost extends Component
{
    use WithFileUploads;

    public $title = '';
    public $description = '';
    public $price = '';
    public $image;

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required|min:10',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:1024', // max 1MB
    ];

    public function save()
    {
        $this->validate();

        $path = null;
        if ($this->image) {
            $path = $this->image->store('post-images', 'public');

            if (!$path) {
                session()->flash('error', 'Failed to upload image.');
                return;
            }
        }

        try {
            $post = Post::create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $path,
                'user_id' => Auth::user()->id,
            ]);

            session()->flash('message', 'Post created successfully!');
            return redirect()->route('post.show', $post);
        } catch (\Exception $e) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            session()->flash('error', 'Failed to create post: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.createpost');
    }
} 