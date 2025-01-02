<?php

namespace Tests\Feature;

use App\Livewire\SelectedMovies;
use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SelectedMoviesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_that_when_guess_limit_of_ten_is_reached_the_loser_modal_is_shown(): void
    {
        $movie = Movie::factory()->create();
        Livewire::test(SelectedMovies::class, ['dailyMovie' => $movie])
            ->set('guessCount', 9)
            ->call('handleMovieGuessSelection', Movie::factory()->create())
            ->assertSee('You Lose');
    }
}
