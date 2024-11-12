@props([
    /* @var $dailyMovie App\Models\Movie */
    'dailyMovie',
    /* @var $selectedMovie App\Models\Movie */
    'selectedMovie'
])

<div class="bg-repeat-x bg-contain bg-center">
<div class="bg-gray-100 p-2 rounded-md max-w-xl mx-auto flex flex-col my-16">
    <p class="text-xl font-semibold mb-2">{{$selectedMovie->title}}</p>

    <div class="grid grid-cols-3 gap-4">
        <div @class([
                'bg-orange-500' => $selectedMovie->release_date->diffInYears($dailyMovie->release_date) <= 5 && $selectedMovie->release_date->year !== $dailyMovie->release_date->year,
                'bg-green-500' => $selectedMovie->release_date->year === $dailyMovie->release_date->year,
                ])
        >
            <p>
                Release Year: {{$selectedMovie->release_date->year}}
                @if ($selectedMovie->release_date->year !== $dailyMovie->release_date->year)
                    {!! $selectedMovie->release_date->year < $dailyMovie->release_date->year ? '&#8593;' : '&#8595;' !!}
                @endif
            </p>
        </div>

        <div @class(['bg-green-500' => $selectedMovie->revenue_tier === $dailyMovie->revenue_tier])>
            <p>Revenue Tier: {{$selectedMovie->revenue_tier}}</p>
        </div>

        <div @class(['bg-green-500' => $selectedMovie->genres === $dailyMovie->genres])>
            <p>Genre: {{$selectedMovie->genres}}</p>
        </div>

        <div @class(['bg-green-500' => $selectedMovie->runtime === $dailyMovie->runtime,
            'bg-orange-500' => ($selectedMovie->runtime !== $dailyMovie->runtime) && ($selectedMovie->runtime - $dailyMovie->runtime <= 10 &&
            $selectedMovie->runtime - $dailyMovie->runtime >= -10)
            ])>
            <p>Runtime: {{$selectedMovie->runtime}} minutes</p>
            @if ($selectedMovie->runtime !== $dailyMovie->runtime)
                {!! $selectedMovie->runtime < $dailyMovie->runtime ? '&#8593;' : '&#8595;' !!}
            @endif
        </div>
        <div @class([
            'bg-green-500' => $selectedMovie->vote_average === $dailyMovie->vote_average,
            'bg-orange-500' => $selectedMovie->vote_average !== $dailyMovie->vote_average &&
                          abs($selectedMovie->vote_average - $dailyMovie->vote_average) <= 1
            ])>
            <p>Rating (1-10): {{$selectedMovie->vote_average}}
                @if ($selectedMovie->vote_average !== $dailyMovie->vote_average)
                    {!! $selectedMovie->vote_average < $dailyMovie->vote_average ? '&#8593;' : '&#8595;' !!}
                @endif
            </p>
        </div>

        <div @class(['bg-green-500' => $selectedMovie->budget_tier === $dailyMovie->budget_tier])>
            <p>Budget Tier: {{$selectedMovie->budget_tier}}</p>
        </div>
    </div>
</div>
</div>
