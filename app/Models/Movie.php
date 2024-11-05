<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    private function convertToTenScale(float $rating): float
    {
        $minRating = 2.9;
        $maxRating = 8.7;
        $newMin = 1;
        $newMax = 10;

        // Map the rating to the 1-10 range
        $scaledRating = (($rating - $minRating) / ($maxRating - $minRating)) * ($newMax - $newMin) + $newMin;

        return round($scaledRating, 1); // Optional: Round to 1 decimal place
    }

    private function getBudgetTier(float $budgetInMillions): string
    {
        return match (true) {
            $budgetInMillions <= 1 => 'Low Budget (< $1M)',
            $budgetInMillions <= 50 => 'Medium Budget ($1M-$50M)',
            $budgetInMillions <= 200 => 'High Budget ($50M-$200M)',
            default => 'Blockbuster ($200M+)',
        };
    }

    private function getRevenueTier(float $revenueInMillions): string
    {
        return match (true) {
            $revenueInMillions < 1 => 'Low Grossing (less than $1M)',
            $revenueInMillions <= 50 => 'Moderate Success ($1M-50M)',
            $revenueInMillions <= 200 => 'Hit ($50M-200M)',
            $revenueInMillions <= 500 => 'Blockbuster ($200M-500M)',
            default => 'Record-Breaker (> $500M)',
        };
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'release_date' => 'datetime:Y-m-d',

        ];
    }
    protected function budget(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => $value / 1000000,
        );
    }
    protected function genres(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => explode(',', $value)[0],
        );
    }
    protected function revenue(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => round(($value / 1000000), 2),
        );
    }
    protected function voteAverage(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => $this->convertToTenScale($value),
        );
    }

    protected function budgetTier(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getBudgetTier($this->budget),
        );
    }

    protected function revenueTier(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getRevenueTier($this->revenue)
        );
    }





}
