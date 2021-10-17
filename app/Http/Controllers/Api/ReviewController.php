<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewCollection;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  ReviewService  $reviewService
     *
     * @return ReviewCollection
     */
    public function index(ReviewService $reviewService): ReviewCollection
    {
        $reviews = $reviewService->getAll();

        return new ReviewCollection($reviews);
    }
}
