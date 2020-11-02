<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ShowComments extends Component
{

    public $content = 'test';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()   
    {
        $comments = Comment::with('user')->get();

        return view('livewire.show-comments', [
            'comments' => $comments
        ]);
    }


    public function create(){

        $this->validate();

        Comment::create([
            'content' => $this->content,
            'user_id' => 2
        ]);
        $this->content = '';
    }

}
