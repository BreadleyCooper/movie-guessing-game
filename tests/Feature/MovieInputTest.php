<?php

namespace Tests\Feature;

use App\Livewire\MovieInput;
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

    public function placeholder(): void {
        // TODO: TDD
    }
}
