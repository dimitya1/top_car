<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewCollection;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/reviews",
     *      operationId="getReviewsList",
     *      tags={"Reviews"},
     *      summary="Get list of all existing reviews",
     *      description="Returns list of car reviews",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="All car models successfully returned",
     *          @OA\JsonContent(ref="#/components/schemas/ReviewResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid data",
     *          @OA\JsonContent()
     *      )
     *     )
     *
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
