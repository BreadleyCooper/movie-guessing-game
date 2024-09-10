<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Movie as MovieModel;


class MovieStatsLayout extends Component
{
    public MovieModel $dailyMovie;
    public MovieModel $selectedMovie;
    public string $releaseDateMatch = "";

    public array $stats = [
        'budget' => '',
        'release_date' => '',
        'genre' => '',
        'production_companies' => '',
    ];
    protected $listeners = ['movieSelected' => 'selectMovie'];
    public function mount(MovieModel $selectedMovie, MovieModel $dailyMovie)
    {
        $this->selectedMovie = $selectedMovie;
        $this->dailyMovie = $dailyMovie;
    }

    public function selectMovie(MovieModel $movie)
    {
        $this->selectedMovie = $movie;
        $this->compareStats();
    }


    public function compareStats()
    {
        $this->stats = [
            'budget' => $this->selectedMovie->budget == $this->dailyMovie->budget ? 'bg-green-500' : 'bg-red-500',
            'release_date' => $this->selectedMovie->release_date == $this->dailyMovie->release_date ? 'bg-green-500' : 'bg-red-500',
            'genre' => $this->selectedMovie->genre == $this->dailyMovie->genre ? 'bg-green-500' : 'bg-red-500',
            'production_companies' => $this->selectedMovie->production_companies == $this->dailyMovie->production_companies ? 'bg-green-500' : 'bg-red-500',
        ];
    }

    public function render()
    {
        return view('livewire.movie-stats-layout');
    }
}
