<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ReviewService
{
    public function __construct(protected Review $model)
    {
    }

    public function getAllPaginated(bool $filterOwn = false): LengthAwarePaginator {
        if ($filterOwn) {
            return $this->model->newQuery()
                ->where('user_id', auth()->id())
                ->with('user')
                ->latest()
                ->paginate(config('topcar.reviews.paginator', 10));
        }
        return $this->model->newQuery()
            ->with('user')
            ->latest()
            ->paginate(config('topcar.reviews.paginator', 10));
    }

    public function store(array $data): Review
    {
        if (auth()->user()) {
            $data['user_id'] = auth()->id();
        }

        return $this->model->create($data);
    }

    public function get(string $filer = null): Collection
    {
        if ($filer) {
            return $this->model
                ->newQuery()
                ->whereHas('carModel', function (Builder $query) use ($filer) {
                    return $query->where('name', $filer);
                })->get();
        }

        return $this->model->all();
    }
}
