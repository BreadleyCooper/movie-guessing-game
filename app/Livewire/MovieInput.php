<?php

namespace App\Livewire;

use App\Models\Movie as MovieModel;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class MovieInput extends Component
{
    public Collection $suggestions;
    public string $inputString = '';

    public array $selectedMovieIds = [];

    public bool $hidden = false;

    public function mount() {
        $this->selectedMovieIds = [];
        $this->suggestions = collect();
    }
    #[on('gameOver')]
    public function updatedHidden() {
        $this->hidden = !$this->hidden;
    }

    public function updatedInputString() {
        $this->suggestions = MovieModel::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($this->inputString) . '%'])->whereNotIn('id', $this->selectedMovieIds)->limit(10)->get()->pluck('title', 'id');
    }

    public function handleMovieGuessSubmission($movieId) {
        $this->inputString = '';
        $selectedMovie = MovieModel::find($movieId);
        $this->dispatch('movieSelected', $selectedMovie);
        $this->selectedMovieIds[] = $movieId;
    }
    public function render()
    {
        return view('livewire.movie-input');
    }
}
