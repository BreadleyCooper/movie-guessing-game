<form wire:submit.prevent='handleMovieGuessSubmission()'>
    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
        <input
            wire:model.live.debounce.250ms="inputString"
            type="text"
            class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Type to search movies..."
            @focus="open = true"
        >
        @if ($suggestions->isNotEmpty())
            <ul class="absolute z-10 w-full bg-white border border-gray-300 rounded-md mt-1 max-h-60 overflow-auto" x-show="open">
                @forelse ($suggestions as $id => $title)
                    <li>
                        <button @click="open = false" type="button" wire:click="handleMovieGuessSubmission({{ $id }})" class="px-3 py-2 hover:bg-gray-100 cursor-pointer w-full">{{ $title }}</button>
                    </li>
                @empty
                    <li class="px-3 py-2 text-gray-500">No movies found</li>
                @endforelse
            </ul>
        @endif
    </div>
</form>
