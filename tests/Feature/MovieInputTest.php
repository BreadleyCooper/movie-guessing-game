<?php

namespace Tests\Feature;

use App\Livewire\MovieInput;
use App\Livewire\SelectedMovies;
use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MovieInputTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_that_suggestions_are_shown_on_input(): void
    {
        Movie::factory(10)->create(['title' => 'Foo']);
        $expectedMovie = Movie::factory()->create(['title' => 'The Test']);
        Livewire::test(MovieInput::class)
            ->set('inputString', 'the')
            ->assertSet('suggestions',collect([$expectedMovie->id => $expectedMovie->title]))
            ->assertSee('The Test')
            ->assertStatus(200);
    }

    public function test_that_selected_movie_gets_added_to_selected_movies_array(): void
    {
        // Create a test movie
        $testMovie = Movie::factory()->create(['title' => 'Test Movie']);

        // Create and mount both components
        $movieInput = Livewire::test(MovieInput::class);
        $selectedMovies = Livewire::test(SelectedMovies::class);

        // Select a movie
        $movieInput->call('handleMovieGuessSubmission', $testMovie->id);

        // Debug: Check if the event was dispatched
        $movieInput->assertDispatched('movieSelected');

        // Manually dispatch the event to SelectedMovies (simulating global event)
        $selectedMovies->dispatch('movieSelected', $testMovie);

        // Assert that the selected movie object is in the selectedMovies array
        $selectedMovies->assertSet('selectedMovies', function ($selectedMovies) use ($testMovie) {
            $firstMovie = $selectedMovies[0];
            return count($selectedMovies) === 1 &&
                $firstMovie instanceof Movie &&
                $firstMovie->id === $testMovie->id;
        });
    }
}
