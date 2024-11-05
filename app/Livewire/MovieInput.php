<?php

namespace App\Livewire;

use App\Models\Movie as MovieModel;
use Illuminate\Support\Collection;
use Livewire\Component;

class MovieInput extends Component
{
    public Collection $suggestions;
    public string $inputString = '';

    public function mount() {
        $this->suggestions = collect();
    }

    public function updatedInputString() {
        $this->suggestions = MovieModel::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($this->inputString) . '%'])->limit(10)->get()->pluck('title', 'id');
    }

    public function handleMovieGuessSubmission($movieId) {
        $this->inputString = '';
        $selectedMovie = MovieModel::find($movieId);
        $this->dispatch('movieSelected', $selectedMovie);
    }
    public function render()
    {
        return view('livewire.movie-input');
    }
}
