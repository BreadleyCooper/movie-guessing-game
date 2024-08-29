<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\Movie as MovieModel;

class Movie extends Component
{
   public MovieModel $dailyMovie;


   public string $userGuess = '';

   public Collection $relatedMovies;
    public function mount()
    {
        $this->dailyMovie = MovieModel::all()->first();
        $this->userGuess = '';
        $this->checkAnswer();
    }

    public function checkAnswer() {
        $this->relatedMovies = MovieModel::where('title', 'like', '%' . $this->userGuess . '%')->get();
    }
    public function render()
    {
        return view('livewire.movie');
    }

}
