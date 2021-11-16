<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        if (isset($data['gallery']) && !empty($data['gallery'])) {
            $gallery = [];
            foreach ($data['gallery'] as $file) {
                $date   = now()->format('Y-m-d_H-i-s');
                $ext    = $file->getClientOriginalExtension();

                $fileName = 'gallery'
                    . '_' . Str::slug($data['title'])
                    . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                    . '_' . $date
                    . '.' . $ext;
                $fullPath = "uploads/review_images/$fileName";

                Storage::putFileAs("public/uploads/review_images", $file, $fileName);

                $gallery[] = $fullPath;
            }
            $data['gallery'] = $gallery;
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
