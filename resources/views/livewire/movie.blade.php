<div>
    <div>
        Selected movie: {{$dailyMovie->title}}
    </div>
    <div class="p-2 mt-5">
        <h2>Guess the movie:</h2>
        <input wire:model.live="userGuess" type="text" class="border-black border border-1 p-2">
        <div class="p-2 m-2 text-3xl font-bold">{{$userGuess}}</div>
        <button wire:click="checkAnswer">Check Answer</button>
    </div>
    <div class="p-2 mt-5">
        <h2>Guess the movie:</h2>
    @foreach ($relatedMovies as $relatedMovie)
            <li>{{ $relatedMovie->title }}</li>
        @endforeach
    </div>
</div>
