<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\Movie as MovieModel;

class Movie extends Component
{
   public MovieModel $dailyMovie;
   public string $inputString = '';

   public MovieModel $selectedMovie;
   public Collection $relatedMovies;
    public function mount()
    {
        $this->dailyMovie = MovieModel::all()->first();
        $this->inputString = '';
        $this->selectedMovie = new MovieModel();
        $this->updateRelatedMovies();
    }

    public function updatedInputString()
    {
        $this->updateRelatedMovies();
    }

    public function selectMovie($movieId) {
        $this->selectedMovie = MovieModel::find($movieId);
        $this->inputString = $this->selectedMovie->title;
        $this->relatedMovies = collect();
    }

    public function updateRelatedMovies()
    {
        $this->relatedMovies = MovieModel::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($this->inputString) . '%'])->get();
    }

    public function render()
    {
        return view('livewire.movie');
    }

}
