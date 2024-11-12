<div>
    @if ($guessCount > 0)
        <p class="mb-2"> Guess {{$guessCount}} of 10</p>

    @endif
    @foreach($selectedMovies as $movie)
        <x-guess-container :selectedMovie="$movie" :dailyMovie="$dailyMovie"/>
    @endforeach
    @if ($showWinnerModal)
        <livewire:winner-modal :dailyMovie="$dailyMovie" :guessCount="1">
    @endif
</div>
