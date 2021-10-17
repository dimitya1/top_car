<?php

namespace App\Services;

use App\Models\Review;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ReviewService
{
    public function __construct(protected Review $model) {}

    public function getAllPaginated(bool $filterOwn = false): LengthAwarePaginator
    {
        if ($filterOwn) {
            return $this->model->newQuery()->where('user_id', auth()->id())->with('user')->latest()->paginate(config('topcar.reviews.paginator', 10));
        }
        return $this->model->newQuery()->with('user')->latest()->paginate(config('topcar.reviews.paginator', 10));
    }

    public function store(array $data): Review
    {
        if (auth()->user()) {
            $data['user_id'] = auth()->id();
        }
        
        return $this->model->create($data);
    }
}
