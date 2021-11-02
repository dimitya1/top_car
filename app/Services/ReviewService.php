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

    public function getAllPaginated(
        bool $filterOwn = false,
        string|int $carBrandId = null,
        string|int $carModelId = null,
    ): LengthAwarePaginator {
        $query = $this->model->newQuery();

        //filtering
        if ($filterOwn) {
            $query = $this->model->newQuery()
                ->where('user_id', auth()->id());
        }
        if ($carBrandId) {
            $query = $this->model->newQuery()
                ->whereHas('carModel', function (Builder $query) use ($carBrandId) {
                    return $query->where('car_brand_id', $carBrandId);
                });
        }
        if ($carModelId) {
            $query = $this->model->newQuery()
                ->where('car_model_id', $carModelId);
        }

        //common part
        return $query
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

    public function destroy(Review $review): bool
    {
        return $review->delete();
    }
}
