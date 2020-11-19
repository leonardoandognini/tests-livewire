<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class ShowComments extends Component
{

    use WithPagination;

    public $content = 'test';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $comments = Comment::with('user')->latest()->paginate(2);

        return view('livewire.show-comments', [
            'comments' => $comments
        ]);
    }


    public function create(){

        $this->validate();

        auth()->user()->comments()->create([
            'content' => $this->content,

        ]);

        $this->content = '';
    }

    public function like($idComment)
    {
        $comment = Comment::find($idComment);
        $comment->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike(Comment  $comment)
    {
        $comment->likes()->delete();
    }

}
