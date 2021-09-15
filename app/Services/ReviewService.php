<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Support\Collection;

class ReviewService
{
    public function __construct(protected Review $model) {}

    public function getAll(): Collection
    {
        return $this->model->all();
    }
}
