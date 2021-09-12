<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    public function __construct(protected Review $model) {}

    public function getAll()
    {
        return $this->model->all();
    }
}
