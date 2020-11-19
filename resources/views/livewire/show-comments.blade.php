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

       <div class="flex">
           <div class="w-1/8">
               @if($comment->user->photo)
                   <img src="{{ url("storage/{$comment->user->photo}") }}" alt="{{$comment->user->name}}" class="rounded-full h-8 w-8">
               @else
                   <img src="https://www.flaticon.com/svg/static/icons/svg/74/74472.svg"  class="rounded-full h-8 w-8">
               @endif

               {{ $comment->user->name }}
           </div>

           <div class="w-7/8">
               {{$comment->content}}
               @if($comment->likes->count())
                   <a href="#" wire:click.prevent="unlike({{ $comment->id }})">Descurtir</a>
               @else
                   <a href="#" wire:click.prevent="like({{ $comment->id }})">Curtir</a>
               @endif
           </div>
       </div>


        <br>
    @endforeach

    <hr>
    {{ $comments->links() }}

</div>
