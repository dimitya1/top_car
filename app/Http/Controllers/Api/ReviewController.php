<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewCollection;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @param  ReviewService  $reviewService
     *
     * @return ReviewCollection
     */
    public function index(Request $request, ReviewService $reviewService): ReviewCollection
    {
        $reviews = $reviewService->get($request->model);

        return new ReviewCollection($reviews);
    }
}
