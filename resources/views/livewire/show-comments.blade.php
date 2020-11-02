<div>
    Show Comments

<p>{{$content}}</p>


<form method="POST" wire:submit.prevent="create">
    <input type="text" name="content" id="content" wire:model="content">

    @error('content')
        {{$message}}
    @enderror

    <button type="submit">Criar comentário</button>
</form>


<hr>

@foreach ($comments as $comment)
    {{ $comment->user->name }} - {{$comment->content}} <br>
@endforeach

</div>