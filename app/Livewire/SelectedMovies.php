<?php

namespace App\Livewire;

use Livewire\Attributes\Session;
use Livewire\Component;
use App\Models\Movie;
use Livewire\Attributes\On;

class SelectedMovies extends Component
{
    public Movie $dailyMovie;
    #[Session(key: 'gameState')]
    public array $selectedMovies = [];
    #[Session(key: 'guessCount')]
    public int $guessCount = 0;
    #[Session(key: 'showWinnerModal')]
    public bool $showWinnerModal = false;
    #[Session(key: 'showLoserModal')]
    public bool $showLoserModal = false;

    public function mount(Movie $dailyMovie)
    {
        $this->dailyMovie = $dailyMovie;
        if(session()->get('showWinnerModal')) {
            $this->showWinnerModal = true;
            $this->gameOver();
        }
        if(session()->get('showLoserModal')) {
            $this->showLoserModal = true;
            $this->gameOver();
        }
    }

    public function gameOver() {
        $this->dispatch('gameOver');
    }

    #[On('closeWinnerModal')]
    public function updatedShowWinnerModal() {
        $this->showWinnerModal = !$this->showWinnerModal;
    }
    #[On('closeLoserModal')]
    public function updatedShowLoserModal() {
        $this->showLoserModal = !$this->showLoserModal;
    }

    #[On('movieSelected')]
    public function handleMovieGuessSelection(Movie $movie) {
        $this->selectedMovies[] = $movie;
        $this->guessCount++;
        if ($movie->id === $this->dailyMovie->id) {
            $this->showWinnerModal = true;
            session()->put('showWinnerModal', true);
            $this->gameOver();
        }

        if ($this->guessCount >= 10) {
            $this->showLoserModal = true;
            session()->put('showLoserModal', true);
            $this->gameOver();
        }
    }

    public function render()
    {
        return view('livewire.selected-movies');
    }
}
