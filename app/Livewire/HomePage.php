<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;
use Livewire\Attributes\Layout;

class HomePage extends Component
{
    public Movie $dailyMovie;


    public function mount() {
        $this->dailyMovie = Movie::all()->first();
    }
    #[Layout('layout')]
    public function render()
    {
        return view('livewire.home-page');
    }
}
