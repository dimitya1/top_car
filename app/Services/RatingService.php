<?php

namespace App\Services;

use App\Models\Rating;
use App\Models\Review;
use Illuminate\Support\Collection;

class RatingService
{
    public function __construct(protected Rating $model) {}

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function calculateLikes(Review $review): int
    {
        return $review->ratings()->where('value', Rating::VALUE_LIKE)->count();
    }

    public function calculateDislikes(Review $review): int
    {
        return $review->ratings()->where('value', Rating::VALUE_DISLIKE)->count();
    }

    public function getRating(Review $review): string
    {
        $likes = self::calculateLikes($review);
        $dislikes = self::calculateDislikes($review);

        if ($likes + $dislikes > 0) {
            $ratingPointsOfFive = round($likes / ($likes + $dislikes) * 5, 1);
            return "$ratingPointsOfFive/5";
        } else {
            return '0/5';
        }
    }
}
