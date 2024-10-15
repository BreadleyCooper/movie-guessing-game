<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Movie;
use Livewire\Attributes\On;

class SelectedMovies extends Component
{
    public Movie $dailyMovie;
    public array $selectedMovies = [];
    public function mount(Movie $dailyMovie)
    {
        $this->dailyMovie = $dailyMovie;
    }

    #[On('movieSelected')]
    public function handleMovieGuessSelection(Movie $movie) {
        $this->selectedMovies[] = $movie;
    }
    public function render()
    {
        return view('livewire.selected-movies');
    }
}
