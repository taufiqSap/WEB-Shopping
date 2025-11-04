<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Blog extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::published()->take(3)->get();
    }
    public function render()
    {
        return view('livewire.blog')->layout('layouts.livewire');
    }
}
