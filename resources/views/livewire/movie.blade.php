<div class="container mx-auto p-4">
    <div class="mb-4">
        <h2 class="text-xl font-semibold mb-2">Guess the movie:</h2>
        <div class="relative">
            <input
                wire:model.live="inputString"
                type="text"
                class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Type to search movies..."
            >
            @if (strlen($inputString) > 0 && $relatedMovies->isNotEmpty())
                <ul class="absolute z-10 w-full bg-white border border-gray-300 rounded-md mt-1 max-h-60 overflow-auto">
                    @forelse ($relatedMovies as $relatedMovie)
                        <li wire:click="selectMovie({{ $relatedMovie->id }})" class="px-3 py-2 hover:bg-gray-100 cursor-pointer">{{ $relatedMovie->title }}</li>
                    @empty
                        <li class="px-3 py-2 text-gray-500">No movies found</li>
                    @endforelse
                </ul>
            @endif
        </div>
    </div>
    <div class="mt-4 {{ $selectedMovie->title ? 'visible' : 'hidden' }}">
        <h3 class="text-lg font-semibold mb-2">Your current guess:</h3>
        <div class="p-2 bg-gray-100 rounded-md text-xl">{{$selectedMovie->title}}</div>
    </div>
    <livewire:movie-stats-layout :selectedMovie="$selectedMovie" :dailyMovie="$dailyMovie" />
    @if(!$selectedMovie->title)
        <div class="flex flex-col gap-2 text-center">
        <p>Guess the movie of the day.
            </p>
            <p>Search for a movie to make your first guess.</p>
        </div>
    @endif
</div>
