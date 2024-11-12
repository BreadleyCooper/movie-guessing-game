<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Movie;
use Livewire\Attributes\On;

class SelectedMovies extends Component
{
    public Movie $dailyMovie;
    public array $selectedMovies = [];
    public int $guessCount = 0;

    public bool $showWinnerModal = false;

    public function mount(Movie $dailyMovie)
    {
        $this->dailyMovie = $dailyMovie;
    }

    #[On('closeWinnerModal')]
    public function updatedShowWinnerModal() {
        $this->showWinnerModal = !$this->showWinnerModal;
    }

    #[On('movieSelected')]
    public function handleMovieGuessSelection(Movie $movie) {
        $this->selectedMovies[] = $movie;
        $this->guessCount++;
        if ($movie->id === $this->dailyMovie->id) {
            $this->showWinnerModal = true;
        }
    }

    public function render()
    {
        return view('livewire.selected-movies');
    }
}
