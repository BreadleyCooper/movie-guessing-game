<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SetDatesForMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-dates-for-movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets a consecutive date for each movie in the database.';

    public string $startDate = '2025-01-02';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting dates for movies...');

        $currentDate = Carbon::parse($this->startDate);

        $movies = Movie::all();

        foreach ($movies as $movie) {
            $movie->selected_on = $currentDate->toDateString();
            $movie->save();
            $currentDate->addDay();
        }

        $this->info('Dates have been set successfully!');
    }
}
