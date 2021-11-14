<?php

namespace App\Services;

use App\Models\Feedback;
use Illuminate\Pagination\LengthAwarePaginator;

class FeedbackService
{
    public function __construct(protected Feedback $model) {}

    public function getAllForAdminTable(): LengthAwarePaginator
    {
        return $this->model->newQuery()->latest()->paginate(config('topcar.feedback.paginator', 25));
    }

    public function save(array $data): Feedback
    {
        if (auth()->user()) {
            $data['created_by'] = auth()->id();
        }

        return $this->model->create($data);
    }
}
